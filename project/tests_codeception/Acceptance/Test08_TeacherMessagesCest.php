<?php

namespace TestsCodeception\Acceptance;

use TestsCodeception\Support\AcceptanceTester;

class Test08_TeacherMessagesCest
{
    public function TeacherMessagesTest(AcceptanceTester $I): void
    {
        $I->amGoingTo('Log in as teacher');
        $I->amOnPage("/login");
        $I->fillField("email", "albus@szkola.com");
        $I->fillField("password", "albus");
        $I->expect('See teacher dashboard');
        $I->click("Zaloguj się");

        $I->click("Tablica");
        $I->see('Wyślij Wiadomość');
        $I->click("Wyślij wiadomość");

        $I->amGoingTo('Send message to Harry Potter');
        $I->seeElement(['xpath' => "//select[@id='receiver_id']"]);
        $I->selectOption(['xpath' => "//select[@id='receiver_id']"], '3');


        $I->fillField("title", "Temat");
        $I->fillField("message", "Treść");
        $I->click("Wyślij");
        $I->seeCurrentUrlEquals('/dashboard');
        $I->expect('See message in database');
        $I->SeeInDatabase('messages', ['sender_id' => '32', 'receiver_id' => '3', 'title' => "Temat", 'message' => 'Treść']);

        $I->amGoingTo('Send message to myself');
        $I->see('Wyślij Wiadomość');
        $I->click("Wyślij wiadomość");

        $I->seeElement(['xpath' => "//select[@id='receiver_id']"]);
        $I->selectOption(['xpath' => "//select[@id='receiver_id']"], '32');

        $I->fillField("title", "Temat1");
        $I->fillField("message", "Treść1");
        $I->click("Wyślij");
        $I->seeCurrentUrlEquals('/dashboard');
        $I->expect('See message in database');
        $I->SeeInDatabase('messages', ['sender_id' => '32', 'receiver_id' => '32', 'title' => 'Temat1', 'message' => 'Treść1']);

        $I->see('Otrzymane wiadomości');
        $I->see('Wiadomość od: Albus Dumbledore');
        $I->see('Temat1');
        $I->see('Treść1');

        $I->click("Wyczyść skrzynkę");
        $I->dontsee('Wiadomość od: Albus Dumbledore');
    }
}
