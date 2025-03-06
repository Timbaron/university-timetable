import requests
import json
from ortools.sat.python import cp_model

# API Base URL
BASE_URL = "http://127.0.0.1:8000/api"

# Fetch Data from Laravel API with Error Handling
def fetch_data(endpoint):
    try:
        response = requests.get(f"{BASE_URL}/{endpoint}")
        response.raise_for_status()  # Raise error for HTTP errors
        return response.json()
    except requests.exceptions.RequestException as e:
        print(f"Error fetching {endpoint}: {e}")
        return {}

# Fetch Data
lecturers = fetch_data("lecturers")  # Example: {1: "Dr. Smith"}
courses = fetch_data("courses")  # Example: {1: {"name": "Mathematics", "prerequisite_courses": []}}
classrooms = fetch_data("classrooms")  # Example: {1: "Room A"}
time_slots = fetch_data("time_slots")  # Example: {1: "Monday 9-11 AM"}
enrollments = fetch_data("enrollments")  # Example: [{"student_id": 1, "course_id": 2, "is_carryover": True}]

# Debugging: Print fetched data
print("Fetched Courses:", json.dumps(courses, indent=4))
print("Fetched Lecturers:", json.dumps(lecturers, indent=4))
print("Fetched Classrooms:", json.dumps(classrooms, indent=4))
print("Fetched Time Slots:", json.dumps(time_slots, indent=4))
print("Fetched Enrollments:", json.dumps(enrollments, indent=4))

# Validate Data Structure
if not isinstance(courses, dict):
    print("Error: 'courses' must be a dictionary.")
    exit(1)

if not isinstance(lecturers, dict) or not isinstance(classrooms, dict) or not isinstance(time_slots, dict):
    print("Error: Lecturers, classrooms, and time slots must be dictionaries.")
    exit(1)

# Group Students by Courses
course_students = {}
for enrollment in enrollments:
    course_id = enrollment.get("course_id")
    student_id = enrollment.get("student_id")

    if course_id is not None and student_id is not None:
        course_students.setdefault(course_id, []).append(student_id)

# Initialize the model
model = cp_model.CpModel()
schedule = {}

# Create Variables for Scheduling
for course_id, course_details in courses.items():
    for lecturer in lecturers:
        for classroom in classrooms:
            for time_slot in time_slots:
                schedule[(course_id, lecturer, classroom, time_slot)] = model.NewBoolVar(
                    f"course_{course_id}_lecturer_{lecturer}_classroom_{classroom}_time_{time_slot}"
                )

# Constraint: Each Course Must be Assigned Exactly Once
for course_id in courses:
    model.Add(sum(schedule[(course_id, lecturer, classroom, time_slot)]
                  for lecturer in lecturers
                  for classroom in classrooms
                  for time_slot in time_slots) == 1)

# Constraint: No Lecturer Can Teach Two Courses at the Same Time
for lecturer in lecturers:
    for time_slot in time_slots:
        model.Add(sum(schedule[(course, lecturer, classroom, time_slot)]
                      for course in courses
                      for classroom in classrooms) <= 1)

# Constraint: No Classroom Can Have More Than One Course at a Time
for classroom in classrooms:
    for time_slot in time_slots:
        model.Add(sum(schedule[(course, lecturer, classroom, time_slot)]
                      for course in courses
                      for lecturer in lecturers) <= 1)

# Constraint: No Student Can Have Overlapping Courses
for student_id in set(sum(course_students.values(), [])):  # Flatten list of students
    for time_slot in time_slots:
        model.Add(
            sum(schedule[(course, lecturer, classroom, time_slot)]
                for course in courses
                for lecturer in lecturers
                for classroom in classrooms
                if student_id in course_students.get(course, [])) <= 1
        )

print("Courses Data:", json.dumps(courses, indent=4))

# Sort Courses by Prerequisites
sorted_courses = sorted(courses.items(), key=lambda x: len(x[1].get("prerequisite_courses", [])) if isinstance(x[1], dict) else 0)

# Constraint: Prerequisites Must be Scheduled Before Dependent Courses
for i, (course, details) in enumerate(sorted_courses):
    for prereq in details.get("prerequisite_courses", []):
        if prereq in courses:
            model.Add(
                sum(schedule[(prereq, lecturer, classroom, time_slot)]
                    for lecturer in lecturers
                    for classroom in classrooms
                    for time_slot in time_slots)
                <= sum(schedule[(course, lecturer, classroom, time_slot)]
                       for lecturer in lecturers
                       for classroom in classrooms
                       for time_slot in time_slots)
            )

# Solve the Problem
solver = cp_model.CpSolver()
status = solver.Solve(model)

# Extract and Display the Schedule
result = []
if status in (cp_model.FEASIBLE, cp_model.OPTIMAL):
    for key in schedule:
        if solver.Value(schedule[key]):
            course, lecturer, classroom, time_slot = key
            result.append({
                "course": courses[course]["name"],
                "lecturer": lecturers[lecturer],
                "classroom": classrooms[classroom],
                "time_slot": time_slots[time_slot]
            })

print("\nGenerated Schedule:")
print(json.dumps(result, indent=4))

# Print Errors if No Solution Found
if status not in (cp_model.FEASIBLE, cp_model.OPTIMAL):
    print("No feasible solution found.")
