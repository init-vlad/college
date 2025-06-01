<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Subject;
use App\Models\Group;
use App\Models\Schedule;
use App\Models\Grade;
use Illuminate\Support\Facades\Hash;

class CollegeDataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Создаем предметы
        $subjects = [
            ['name' => 'Математика', 'description' => 'Высшая математика и алгебра'],
            ['name' => 'Информатика', 'description' => 'Основы программирования и компьютерных технологий'],
            ['name' => 'Английский язык', 'description' => 'Деловой английский язык'],
            ['name' => 'Экономика', 'description' => 'Основы экономической теории'],
            ['name' => 'Менеджмент', 'description' => 'Теория и практика управления'],
            ['name' => 'Маркетинг', 'description' => 'Основы маркетинга и рекламы'],
            ['name' => 'Бухгалтерский учет', 'description' => 'Основы бухгалтерского учета и отчетности'],
            ['name' => 'Право', 'description' => 'Основы гражданского и коммерческого права'],
        ];

        foreach ($subjects as $subject) {
            Subject::create($subject);
        }

        // Создаем группы
        $groups = [
            ['name' => '306-22', 'specialty' => 'Экономика и бухгалтерский учет', 'year' => 2022, 'course' => 3],
            ['name' => '307-22', 'specialty' => 'Банковское дело', 'year' => 2022, 'course' => 3],
            ['name' => '308-23', 'specialty' => 'Менеджмент', 'year' => 2023, 'course' => 2],
            ['name' => '309-23', 'specialty' => 'Маркетинг', 'year' => 2023, 'course' => 2],
            ['name' => '310-24', 'specialty' => 'Информационные технологии', 'year' => 2024, 'course' => 1],
            ['name' => '311-24', 'specialty' => 'Туризм', 'year' => 2024, 'course' => 1],
        ];

        foreach ($groups as $group) {
            Group::create($group);
        }

        // Создаем администратора
        User::create([
            'name' => 'Администратор',
            'email' => 'admin@icb.kz',
            'password' => Hash::make('password'),
            'role' => 'admin',
        ]);

        // Создаем преподавателей
        $teachers = [
            ['name' => 'Иванов Иван Иванович', 'email' => 'ivanov@icb.kz'],
            ['name' => 'Петрова Мария Сергеевна', 'email' => 'petrova@icb.kz'],
            ['name' => 'Сидоров Алексей Петрович', 'email' => 'sidorov@icb.kz'],
            ['name' => 'Козлова Елена Владимировна', 'email' => 'kozlova@icb.kz'],
            ['name' => 'Морозов Дмитрий Александрович', 'email' => 'morozov@icb.kz'],
        ];

        foreach ($teachers as $teacher) {
            User::create([
                'name' => $teacher['name'],
                'email' => $teacher['email'],
                'password' => Hash::make('password'),
                'role' => 'teacher',
            ]);
        }

        // Создаем студентов
        $students = [
            // Группа 306-22
            ['name' => 'Абдуллаев Арман', 'email' => 'arman@student.icb.kz', 'group_id' => 1],
            ['name' => 'Бекова Айгуль', 'email' => 'aigul@student.icb.kz', 'group_id' => 1],
            ['name' => 'Валиев Данияр', 'email' => 'daniyar@student.icb.kz', 'group_id' => 1],
            ['name' => 'Габдуллина Диана', 'email' => 'diana@student.icb.kz', 'group_id' => 1],

            // Группа 307-22
            ['name' => 'Ержанов Ерлан', 'email' => 'erlan@student.icb.kz', 'group_id' => 2],
            ['name' => 'Жанибекова Жанна', 'email' => 'zhanna@student.icb.kz', 'group_id' => 2],
            ['name' => 'Исмаилов Ислам', 'email' => 'islam@student.icb.kz', 'group_id' => 2],

            // Группа 308-23
            ['name' => 'Касымов Касым', 'email' => 'kasym@student.icb.kz', 'group_id' => 3],
            ['name' => 'Лукпанова Лаура', 'email' => 'laura@student.icb.kz', 'group_id' => 3],
            ['name' => 'Мухамедов Мурат', 'email' => 'murat@student.icb.kz', 'group_id' => 3],
        ];

        foreach ($students as $student) {
            User::create([
                'name' => $student['name'],
                'email' => $student['email'],
                'password' => Hash::make('password'),
                'role' => 'student',
                'group_id' => $student['group_id'],
            ]);
        }

        // Создаем расписание
        $schedules = [
            // Понедельник
            ['subject_id' => 1, 'teacher_id' => 3, 'group_id' => 1, 'day_of_week' => 'Понедельник', 'start_time' => '09:00', 'end_time' => '10:30', 'classroom' => '101'],
            ['subject_id' => 2, 'teacher_id' => 4, 'group_id' => 1, 'day_of_week' => 'Понедельник', 'start_time' => '10:45', 'end_time' => '12:15', 'classroom' => '102'],
            ['subject_id' => 3, 'teacher_id' => 5, 'group_id' => 2, 'day_of_week' => 'Понедельник', 'start_time' => '09:00', 'end_time' => '10:30', 'classroom' => '103'],

            // Вторник
            ['subject_id' => 4, 'teacher_id' => 6, 'group_id' => 1, 'day_of_week' => 'Вторник', 'start_time' => '09:00', 'end_time' => '10:30', 'classroom' => '201'],
            ['subject_id' => 5, 'teacher_id' => 7, 'group_id' => 1, 'day_of_week' => 'Вторник', 'start_time' => '10:45', 'end_time' => '12:15', 'classroom' => '202'],
            ['subject_id' => 1, 'teacher_id' => 3, 'group_id' => 2, 'day_of_week' => 'Вторник', 'start_time' => '13:00', 'end_time' => '14:30', 'classroom' => '101'],

            // Среда
            ['subject_id' => 6, 'teacher_id' => 4, 'group_id' => 3, 'day_of_week' => 'Среда', 'start_time' => '09:00', 'end_time' => '10:30', 'classroom' => '301'],
            ['subject_id' => 7, 'teacher_id' => 5, 'group_id' => 3, 'day_of_week' => 'Среда', 'start_time' => '10:45', 'end_time' => '12:15', 'classroom' => '302'],
        ];

        foreach ($schedules as $schedule) {
            Schedule::create($schedule);
        }

        // Создаем оценки
        $grades = [
            // Оценки для студентов группы 306-22
            ['student_id' => 8, 'subject_id' => 1, 'teacher_id' => 3, 'grade' => 5, 'grade_type' => 'exam', 'date' => '2024-05-15', 'comment' => 'Отличная работа на экзамене'],
            ['student_id' => 8, 'subject_id' => 2, 'teacher_id' => 4, 'grade' => 4, 'grade_type' => 'test', 'date' => '2024-05-10', 'comment' => 'Хорошее понимание материала'],
            ['student_id' => 9, 'subject_id' => 1, 'teacher_id' => 3, 'grade' => 4, 'grade_type' => 'exam', 'date' => '2024-05-15', 'comment' => 'Хорошие знания'],
            ['student_id' => 9, 'subject_id' => 2, 'teacher_id' => 4, 'grade' => 5, 'grade_type' => 'homework', 'date' => '2024-05-12', 'comment' => 'Превосходное домашнее задание'],
            ['student_id' => 10, 'subject_id' => 1, 'teacher_id' => 3, 'grade' => 3, 'grade_type' => 'test', 'date' => '2024-05-08', 'comment' => 'Нужно больше практики'],

            // Оценки для студентов группы 307-22
            ['student_id' => 12, 'subject_id' => 3, 'teacher_id' => 5, 'grade' => 5, 'grade_type' => 'exam', 'date' => '2024-05-20', 'comment' => 'Отличное знание английского'],
            ['student_id' => 13, 'subject_id' => 3, 'teacher_id' => 5, 'grade' => 4, 'grade_type' => 'test', 'date' => '2024-05-18', 'comment' => 'Хороший прогресс'],
            ['student_id' => 14, 'subject_id' => 1, 'teacher_id' => 3, 'grade' => 4, 'grade_type' => 'homework', 'date' => '2024-05-16', 'comment' => 'Качественная работа'],
        ];

        foreach ($grades as $grade) {
            Grade::create($grade);
        }
    }
}
