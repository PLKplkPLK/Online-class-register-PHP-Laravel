<?php

namespace TestsCodeception\Acceptance;

use TestsCodeception\Support\AcceptanceTester;

class Test04_StudentAddCest
{
    public function StudentAddTest(AcceptanceTester $I): void
    {
        $I->amGoingTo('Log in as Admin');
        $I->amOnPage("/login");
        $I->fillField("email", "admin@szkola.com");
        $I->fillField("password", "admin");
        $I->expect('See admin dashboard');
        $I->click("Zaloguj się");

        $I->amGoingTo('Add new student');
        $I->see('Dodaj nowego ucznia');
        $I->click('Dodaj nowego ucznia');

        $I->amGoingTo('Check for no fill');
        $I->click('Stwórz');
        $I->expect('See warning messages');
        $I->see('Pole name jest wymagane.');
        $I->see('Pole surname jest wymagane.');
        $I->see('Pole email jest wymagane.');
        $I->see('Pole password jest wymagane.');

        $I->amGoingTo('Fill with correct data');
        $I->fillField("name", "Aleksandra");
        $I->fillField("surname", "Kowalska");
        $I->fillField("email", "OlaK@szkola.com");
        $I->fillField("about", "Astma");
        $I->seeElement('select#class_id');
        $I->seeOptionIsSelected('select#class_id', '1a');
        $I->fillField("password", "Ola");
        $I->click('Stwórz');

        $I->click("a[href*='page=4']");
        $I->expect('See newly added student');
        $I->see("Aleksandra");
        $I->see("Kowalska");
        $I->see("OlaK@szkola.com");

        $I->expect('Check if student is in database');
        $I->SeeInDatabase('users', ['name' => 'Aleksandra', 'surname' => 'Kowalska', 'email' => 'OlaK@szkola.com']);

        $I->see('Szczegóły');
        $I->click(['xpath' => "//tbody/tr[last()]/td[last()]/a"]);

        $I->see("Aleksandra");
        $I->see("Kowalska");
        $I->see("1a");
        $I->see("Astma");

        $I->dontseeCurrentUrlEquals("/students");
        $I->see("Edytuj");
        $I->see('Usuń konto');

        $I->amGoingTo('Edit student data');
        $I->click('Edytuj');

        $I->seeInField("name", "Aleksandra");
        $I->seeInField("surname", "Kowalska");
        $I->seeInField("email", "OlaK@szkola.com");
        $I->seeInField("about", "Astma");
        $I->seeOptionIsSelected('select#class_id', '1a');
        $I->seeInField("password", "");

        $I->SeeInDatabase('grades', ['year'=> 1, 'letter' => 'a']);
        $I->SeeInDatabase('grades', ['year'=> 1, 'letter' => 'b']);
        $I->SeeInDatabase('grades', ['year'=> 1, 'letter' => 'b']);

        $I->amGoingTo('Update student data');
        $I->FillField("name", "Ola");
        $I->FillField("surname", "Kowalski");
        $I->FillFIeld("email", "AleksandraK@szkola.com");
        $I->fillField("password", "Aleksandra");
        $I->click("Zaktualizuj");

        $I->click("a[href*='page=4']");
        $I->expect('See updated data');
        $I->see("Ola");
        $I->see("Kowalski");
        $I->see("AleksandraK@szkola.com");
        $I->click(['xpath' => "//tbody/tr[last()]/td[last()]/a"]);

        $I->expect('Updated student is in database');
        $I->SeeInDatabase('users', ['name' => 'Ola', 'surname' => 'Kowalski', 'email' => 'AleksandraK@szkola.com']);


        $I->amGoingTo('Delete student');
        $I->click('Usuń konto');

        $I->expect('Do not see deleted student');
        $I->dontSeeInDatabase('users', ['name' => 'Ola', 'surname' => 'Kowalski', 'email' => 'AleksandraK@szkola.com']);
    }
}
