<?php

use Alura\Doctrine\Entity\Student;
use Alura\Doctrine\Helper\EntityManagerCreator;

require_once __DIR__ . '/../vendor/autoload.php';

$entityManager = EntityManagerCreator::createEntityManager();
$studentRepository = $entityManager->getRepository(Student::class);

$studentList = $studentRepository->findAll();

foreach ($studentList as $student) {
	echo "ID: $student->id\nNome: $student->name\n\n";
}

$studentCount = $studentRepository->count([]);
echo $studentCount . PHP_EOL;