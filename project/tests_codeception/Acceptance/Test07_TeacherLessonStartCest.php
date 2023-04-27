<?php

namespace TestsCodeception\Acceptance;

use TestsCodeception\Support\AcceptanceTester;

class Test07_TeacherLessonStartCest
{
    public function TeacherLessonStartTest(AcceptanceTester $I): void
    {
        $I->amGoingTo('Log in as teacher');
        $I->amOnPage("/login");
        $I->fillField("email", "minerva@szkola.com");
        $I->fillField("password", "minerva");
        $I->expect('See teacher dashboard');
        $I->click("Zaloguj się");

        $I->amGoingTo('Start lesson');
        $I->see('Plan zajęć');
        $I->see('Rozpocznij lekcję');
        $I->click("Rozpocznij lekcję");
        $I->see('1a');
        $I->click("Wybierz");

        $I->amGoingTo('Check attendance, grades etc');
        $I->fillField("attendance2", "-");
        $I->fillField("mark2", "5");
        $I->fillField("descr2", "sprawdzian");
        $I->fillField("uwaga2", "wywrócenie biurka");

        $I->fillField("mark3", "4");
        $I->fillField("descr3", "kartkówka");


        $I->click("Zapisz frekwencję, oceny i uwagi");
        $I->see('5,');
        $I->see('4,');

        $I->click("Zajęcia");

        $I->expect('see grades and description');
        $I->seeInSource('5');
        $I->seeInSource('sprawdzian');
        $I->seeInSource('4');
        $I->seeInSource('kartkówka');
    }
}
