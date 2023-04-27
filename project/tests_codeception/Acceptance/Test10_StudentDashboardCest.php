<?php

namespace TestsCodeception\Acceptance;

use TestsCodeception\Support\AcceptanceTester;

class Test10_StudentDashboardCest
{
    public function StudentDashboardTest(AcceptanceTester $I): void
    {
        $I->amGoingTo('Log in as student');
        $I->amOnPage("/login");
        $I->fillField("email", "harry@szkola.com");
        $I->fillField("password", "harry");
        $I->expect('See student dashboard');
        $I->click("Zaloguj się");

        $I->see('Nieobecności');
        //$I->see('Frekwencja');
        $I->see('Uwagi');
        $I->see('Oceny');
        $I->see('Zajęcia');
        $I->see('Wyślij Wiadomość');
        $I->click("Wyślij wiadomość");

        $I->amGoingTo('Send message to Albus Dumbledore');
        $I->seeElement(['xpath' => "//select[@id='receiver_id']"]);
        $I->selectOption(['xpath' => "//select[@id='receiver_id']"], '32');


        $I->fillField("title", "Temat");
        $I->fillField("message", "Treść");
        $I->click("Wyślij");
        $I->seeCurrentUrlEquals('/dashboard');
        $I->expect('See message in database');
        $I->SeeInDatabase('messages', ['sender_id' => '3', 'receiver_id' => '32', 'title' => "Temat", 'message' => 'Treść']);

        $I->amGoingTo('Send message to myself');
        $I->see('Wyślij Wiadomość');
        $I->click("Wyślij wiadomość");

        $I->seeElement(['xpath' => "//select[@id='receiver_id']"]);
        $I->selectOption(['xpath' => "//select[@id='receiver_id']"], '3');

        $I->fillField("title", "Temat1");
        $I->fillField("message", "Treść1");
        $I->click("Wyślij");
        $I->seeCurrentUrlEquals('/dashboard');
        $I->expect('See message in database');
        $I->SeeInDatabase('messages', ['sender_id' => '3', 'receiver_id' => '3', 'title' => 'Temat1', 'message' => 'Treść1']);

        $I->see('Otrzymane wiadomości');
        $I->see('Wiadomość od: Harry Potter');
        $I->see('Temat1');
        $I->see('Treść1');

        $I->click("Wyczyść skrzynkę");
        $I->seeCurrentUrlEquals('/dashboard');
        $I->dontsee('Wiadomość od: Harry Potter');

        $I->amGoingTo('Check if student can get to other subsites by url');
        $I->amOnPage('/students');
        $I->expect('See unauthorized message');
        $I->see('401 UNAUTHORIZED');
        $I->amOnPage('/teachers');
        $I->see('401 UNAUTHORIZED');
        $I->amOnPage('/activity');
        $I->see('401 UNAUTHORIZED');
        $I->amOnPage('/activity/1');
        $I->see('401 UNAUTHORIZED');
        $I->amOnPage('/start');
        $I->see('401 UNAUTHORIZED');
        $I->amOnPage('/zajecia');
        $I->see('401 UNAUTHORIZED');
        $I->amOnPage('/myclass');
        $I->see('401 UNAUTHORIZED');
    }
}
