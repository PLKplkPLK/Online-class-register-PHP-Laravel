<?php

namespace TestsCodeception\Acceptance;

use TestsCodeception\Support\AcceptanceTester;

class Test05_TeacherAddCest
{
    public function TeacherAddTest(AcceptanceTester $I): void
    {
        $I->amGoingTo('Log in as Admin');
        $I->amOnPage("/login");
        $I->fillField("email", "admin@szkola.com");
        $I->fillField("password", "admin");
        $I->expect('See admin dashboard');
        $I->click("Zaloguj się");

        $I->amGoingTo('Add new teacher');
        $I->see('Dodaj nowego nauczyciela');
        $I->click('Dodaj nowego nauczyciela');

        $I->seeCurrentUrlEquals('/teachers/create');

        $I->fillField("name", "nauczyciel");
        $I->fillField("surname", "Nowak");
        $I->fillField("email", "NaN@szkola.com");
        $I->seeElement(['xpath' => "//select[@id='subject_id']"]);
        $I->selectOption(['xpath' => "//select[@id='subject_id']"], '2');
        $I->fillField("password", "Nowak");


        $I->see('Transmutacja ', '#subject_id');
        $I->see('Eliksiry ', '#subject_id');
        $I->see('Obrona przed czarną magią ', '#subject_id');
        $I->see('Wróżbiarstwo ', '#subject_id');
        $I->see('Quidditch ', '#subject_id');
        $I->see('Zielarstwo ', '#subject_id');
        $I->see('Opieka nad magicznymi stworzeniami  ', '#subject_id');
        $I->checkOption(['id' => 'is_class_teacher']);
        $I->seeElement(['xpath' => "//select[@id='class_id']"]);
        $I->selectOption(['xpath' => "//select[@id='class_id']"], '3');

        $I->click('Stwórz');
        $I->click("a[href*='page=2']");

        $I->expect('See newly added teacher');
        #$I->seeCurrentUrlEquals("/teachers");
        $I->see("NaN@szkola.com");
        $I->see("Nowak");
        $I->see("nauczyciel");
        $I->see("Eliksiry");

        $I->expect('Check if teacher is in database');
        $I->SeeInDatabase('users', ['name' => 'nauczyciel', 'surname' => 'Nowak', 'email' => 'NaN@szkola.com']);

        $I->expect('Check if teacher is in other subpage');
        $I->click('Tablica');
        $I->click('Dodaj nowe zajęcia');
        $I->see("nauczyciel Nowak");
        $I->click('Nauczyciele');

        $I->click("a[href*='page=2']");
        $I->see('Szczegóły');
        $I->click(['xpath' => "//tbody/tr[last()]/td[last()]/a"]);

        $I->see("nauczyciel");
        $I->see("Nowak");
        $I->see("Eliksiry");
        $I->see("Klasa 1c");

        $I->see("Edytuj");
        $I->see('Usuń konto');

        $I->amGoingTo('Edit teacher data');
        $I->click('Edytuj');

        $I->seeInField("name", "nauczyciel");
        $I->seeInField("surname", "Nowak");
        $I->seeInField("email", "NaN@szkola.com");
        $I->seeOptionIsSelected('select#subject_id', 'Transmutacja');

        $I->FillField("name", "Nauczyciel");
        $I->FillField("surname", "Kowal");
        $I->FillFIeld("email", "NaK@szkola.com");
        $I->expect('See updated data');
        $I->click("Zaktualizuj");

        $I->click("a[href*='page=2']");
        $I->see("Nauczyciel");
        $I->see("Kowal");
        $I->see("NaK@szkola.com");
        $I->click(['xpath' => "//tbody/tr[last()]/td[last()]/a"]);

        $I->see("Ten nauczyciel nie jest wychowawcą.");
        $I->expect('Updated teacher is in database');
        $I->SeeInDatabase('users', ['name' => 'Nauczyciel', 'surname' => 'Kowal', 'email' => 'NaK@szkola.com']);

        $I->amGoingTo('Delete teacher');
        $I->click('Usuń konto');

        $I->expect('Do not see deleted teacher');
        $I->dontSeeInDatabase('users', ['name' => 'Nauczyciel', 'surname' => 'Kowal', 'email' => 'NaK@szkola.com']);
    }
}
