# Course Scheduling System

This project is a **Course Scheduling System** that automates the scheduling of courses, lecturers, classrooms, and time slots using **Google OR-Tools**. It fetches data from a Laravel-based API and ensures constraints like prerequisites, lecturer availability, and classroom usage are respected.

---

## Features
- Fetches **courses, lecturers, classrooms, time slots, and enrollments** from a Laravel API.
- Uses **Google OR-Tools** to optimize scheduling.
- Enforces **constraints** like:
  - No lecturer teaching two courses at the same time.
  - No student having overlapping courses.
  - Prerequisites must be scheduled before dependent courses.
- Outputs the generated schedule in JSON format.

---

## Technologies Used
- **Laravel** (Backend API)
- **Python** (Scheduling Algorithm)
- **Google OR-Tools** (Constraint Programming)
- **MySQL/PostgreSQL** (Database)
- **REST API** (Data Fetching)

---

## Installation & Setup

### 1. Clone the Repository
```sh
git clone https://github.com/your-username/course-scheduling.git
cd course-scheduling
```

### 2. Backend (Laravel API)
1. Install dependencies:
   ```sh
   composer install
   ```
2. Configure `.env`:
   ```sh
   cp .env.example .env
   ```
   Set database credentials in `.env`.
3. Migrate & Seed the database:
   ```sh
   php artisan migrate --seed
   ```
4. Start the Laravel server:
   ```sh
   php artisan serve
   ```

### 3. Scheduling Algorithm (Python Script)
1. Create a virtual environment (optional but recommended):
   ```sh
   python -m venv venv
   source venv/bin/activate  # macOS/Linux
   venv\Scripts\activate  # Windows
   ```
2. Install dependencies:
   ```sh
   pip install -r requirements.txt
   ```
3. Run the scheduler:
   ```sh
   python schedule_generator.py
   ```

---

## API Endpoints
| Endpoint          | Description |
|------------------|-------------|
| `GET /api/courses` | Fetch all courses |
| `GET /api/lecturers` | Fetch all lecturers |
| `GET /api/classrooms` | Fetch all classrooms |
| `GET /api/time_slots` | Fetch available time slots |
| `GET /api/enrollments` | Fetch student enrollments |

---

## Running the Scheduler
Once the Laravel API is running, execute the Python script:
```sh
python schedule_generator.py
```
If the scheduling is successful, you will see a generated schedule printed as JSON.

---

## Troubleshooting
- **Issue: Python script returns an empty schedule**
  - Ensure the Laravel API is running (`php artisan serve`).
  - Check API responses using:
    ```sh
    curl http://127.0.0.1:8000/api/courses
    ```
  - Confirm database is seeded properly (`php artisan migrate --seed`).

- **Issue: `Target class [Database\Seeders\CoursePrerequisiteSeeder] does not exist`**
  - Ensure the seeder file is placed in `database/seeders/`.
  - Run `composer dump-autoload` and retry `php artisan db:seed`.

- **Issue: Git is ignoring the Python script**
  - Edit `.gitignore` and add:
    ```
    !schedule_generator.py
    ```
  - Force add the file:
    ```sh
    git add -f schedule_generator.py
    ```

---

## Contributing
Pull requests are welcome! Follow these steps:
1. Fork the repository.
2. Create a new branch (`git checkout -b feature-branch`).
3. Make your changes.
4. Commit (`git commit -m "Added new feature"`).
5. Push (`git push origin feature-branch`).
6. Create a **Pull Request**.

---

## License
This project is licensed under the **MIT License**.

---

## Contact
For questions or support, contact **[Your Name]** at [your.email@example.com].

