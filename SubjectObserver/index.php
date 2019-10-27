<?php
include __DIR__.'/Book.php';
include __DIR__.'/Student.php';
include __DIR__.'/Teacher.php';

$student = new Student();
$teacher = new Teacher();
$book = new Book('<<钢铁是怎样炼成的>>', '奥斯特洛夫斯基', '79.00');
$book->attach($student);
$book->attach($teacher);

$book->notify();