<?php

namespace TestsCodeception\Acceptance;

use TestsCodeception\Support\AcceptanceTester;

class Test00_HomepageCest
{
    public function homepageTest(AcceptanceTester $I): void
    {
        $I->wantTo('see Laravel links on homepage');

        $I->amOnPage('/');

        // Check that the "Aktualności" button is visible
        $I->seeElement(['css' => 'a[href="/aktualnosci"]']);

        // Check that the "Patron" button is visible
        $I->seeElement(['css' => 'a[href="/patron"]']);

        // Check that the "Kontakt" button is visible
        $I->seeElement(['css' => 'a[href="/kontakt"]']);

        $I->seeLink("Zaloguj się do dziennika", "/login");
    }
}
