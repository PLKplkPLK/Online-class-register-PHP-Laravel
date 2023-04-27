<?php

namespace TestsCodeception\Acceptance;

use TestsCodeception\Support\AcceptanceTester;

class Test06_LessonAddCest
{
    public function LessonAddCestTest(AcceptanceTester $I): void
    {
        $I->amGoingTo('Log in as Admin');
        $I->amOnPage("/login");
        $I->fillField("email", "admin@szkola.com");
        $I->fillField("password", "admin");
        $I->expect('See admin dashboard');
        $I->click("Zaloguj się");

        $I->amGoingTo('Add new classes');
        $I->see('Dodaj nowe zajęcia');
        $I->click("Dodaj nowe zajęcia");


        $I->seeElement(['xpath' => "//select[@id='subject_id']"]);
        $I->selectOption(['xpath' => "//select[@id='subject_id']"], '2');
        $I->seeElement(['xpath' => "//select[@id='teacher_id']"]);
        $I->selectOption(['xpath' => "//select[@id='teacher_id']"], '34');
        $I->seeElement(['xpath' => "//select[@id='day']"]);
        $I->selectOption(['xpath' => "//select[@id='day']"], 'Piątek');
        $I->seeElement(['xpath' => "//select[@id='hour']"]);
        $I->selectOption(['xpath' => "//select[@id='hour']"], '14:35');
        $I->seeElement(['xpath' => "//select[@id='grade_id']"]);
        $I->selectOption(['xpath' => "//select[@id='grade_id']"], '8');


        $I->click('Stwórz');
        $I->amOnPage('/activity');
        $I->click("a[href*='page=5']");
        $I->expect('See newly added Classes');
        $I->see('Eliksiry');
        $I->see('3b');
        $I->see('Severus Snape');
        $I->see('Piątek');
        $I->see('14:35');
        $I->expect('Classes is in database');
        $I->SeeInDatabase('activities', ['subject_id' => 2, 'grade_id' => 8, 'teacher_id'=>34, 'day'=>'Piątek', 'hour'=>'14:35']);

        $I->click("td a[href*='activity']");
        $I->see('Eliksiry');
        $I->see('3b');
        $I->see('Severus Snape');
        $I->see('Piątek');
        $I->see('14:35');

        $I->amGoingTo('Update classes');
        $I->see('Edytuj zajęcia');
        $I->click('Edytuj zajęcia');

        $I->seeElement(['xpath' => "//select[@id='subject_id']"]);
        $I->selectOption(['xpath' => "//select[@id='subject_id']"], '2');
        $I->seeElement(['xpath' => "//select[@id='teacher_id']"]);
        $I->selectOption(['xpath' => "//select[@id='teacher_id']"], '34');
        $I->seeElement(['xpath' => "//select[@id='day']"]);
        $I->selectOption(['xpath' => "//select[@id='day']"], 'Poniedziałek');
        $I->seeElement(['xpath' => "//select[@id='hour']"]);
        $I->selectOption(['xpath' => "//select[@id='hour']"], '12:45');
        $I->seeElement(['xpath' => "//select[@id='grade_id']"]);
        $I->selectOption(['xpath' => "//select[@id='grade_id']"], '4');

        $I->see('Zaktualizuj');
        $I->click('Zaktualizuj');
        $I->click("a[href*='page=5']");

        $I->expect('See newly updated data');
        $I->see('Eliksiry');
        $I->see('2a');
        $I->see('Severus Snape');
        $I->see('Poniedziałek');
        $I->see('12:45');
        $I->expect('Updated Classes is in database');
        $I->SeeInDatabase('activities', ['subject_id' => 2, 'grade_id' => 4, 'teacher_id'=>34, 'day'=>'Poniedziałek', 'hour'=>'12:45']);

        $I->amGoingTo('Delete classes');
        $I->click("td a[href*='activity']");
        $I->see('Usuń zajęcia');
        $I->click('Usuń zajęcia');
        $I->seeCurrentUrlEquals('/activity');
        $I->dontSeeInDatabase('activities', ['subject_id' => 2, 'grade_id' => 4, 'teacher_id'=>34, 'day'=>'Poniedziałek', 'hour'=>'12:45']);
    }
}
