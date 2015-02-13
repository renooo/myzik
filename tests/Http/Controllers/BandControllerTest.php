<?php namespace Http\Controllers;

use TestCase;

class BandControllerTest extends TestCase
{
    function testIndexHasNoBandWhenDbEmpty()
    {
        $this->seed('TestsEmptySeeder');

        $response = $this->action('GET', 'BandController@index');
        $view = $response->original;

        $this->assertResponseOk();
        $this->assertViewHas('bands');
        $this->assertEmpty($view['bands']);

        $this->seed('TestsSeeder');
    }

    function testIndexHasBandsWhenDbSeeded()
    {
        $response = $this->action('GET', 'BandController@index');
        $view = $response->original;

        $this->assertResponseOk();
        $this->assertViewHas('bands');
        $this->assertNotEmpty($view['bands']);
    }


    function testIndexHasPaginatedBands()
    {
        /** NB : TestSeeders insère 25 groupes */

        $response = $this->action('GET', 'BandController@index');
        $view = $response->original;

        $this->assertResponseOk();
        $this->assertViewHas('bands');
        $this->assertCount(10, $view['bands']);

        $response = $this->action('GET', 'BandController@index', ['page' => 2]);
        $view = $response->original;

        $this->assertResponseOk();
        $this->assertViewHas('bands');
        $this->assertCount(10, $view['bands']);

        $response = $this->action('GET', 'BandController@index', ['page' => 3]);
        $view = $response->original;

        $this->assertResponseOk();
        $this->assertViewHas('bands');
        $this->assertCount(5, $view['bands']);

        $response = $this->action('GET', 'BandController@index', ['page' => 4]);
        $view = $response->original;

        $this->assertResponseOk();
        $this->assertViewHas('bands');
        $this->assertCount(0, $view['bands']);
    }

    function testShowWorksForExistingBand()
    {
        $response = $this->action('GET', 'BandController@show', ['band' => 1]);
        $view = $response->original;

        $this->assertResponseOk();
        $this->assertViewHas('band');
        $this->assertInstanceOf('App\Band', $view['band']);
    }

    function testShowFailsForNonExistingBand()
    {
        $this->action('GET', 'BandController@show', ['band' => 666]);
        $this->assertResponseStatus(404);
        $this->assertViewMissing('band');
    }

    function testCreateFailsForGuest()
    {
        $this->action('GET', 'BandController@create');
        $this->assertRedirectedToAction('AuthController@getLogin');
    }

    function testStoreFailsForGuest()
    {
        $this->action('POST', 'BandController@store');
        $this->assertRedirectedToAction('AuthController@getLogin');
    }

    function testEditFailsForGuest()
    {
        $this->action('GET', 'BandController@edit', ['band' => 1]);
        $this->assertRedirectedToAction('AuthController@getLogin');
    }

    function testUpdateFailsForGuest()
    {
        $this->action('PUT', 'BandController@update', ['band' => 1]);
        $this->assertRedirectedToAction('AuthController@getLogin');
    }

    /*function testCreateWorksForUser()
    {
        $user = App\User::find(1);
        $this->be($user);

        $this->action('GET', 'BandController@create');

        $this->assertResponseOk();
    }

    function testEditWorksForUser()
    {
        $user = App\User::find(1);
        $this->be($user);

        $band = $user->records->random();
        $this->action('GET', 'BandController@edit', ['band' => $band->id]);

        $this->assertResponseOk();
        $this->assertViewHas('band', $band);
    }

    function testEditFailsForUserAndNonExistingBand()
    {
        $user = App\User::find(1);
        $this->be($user);

        $this->action('GET', 'BandController@edit', ['band' => 666]);

        $this->assertResponseStatus(404);
        $this->assertViewMissing('band');
    }

    function testEditFailsForUserOtherThanCreator()
    {
        $user = App\User::find(1);
        $this->be($user);

        $otherUser = App\User::find(2);
        $band = $otherUser->band->random();
        $this->action('GET', 'BandController@edit', ['band' => $band->id]);

        $this->assertResponseStatus(403);
        $this->assertViewMissing('band');
    }

    function testUpdateFailsForUserOtherThanCreator()
    {
    }

    function testStoreFailsForUserWithBadData()
    {
    }

    function testUpdateFailsForUserWithBadData()
    {
    }

    function testStoreWorksForUserWithGoodData()
    {
    }

    function testUpdateWorksForUserWithGoodData()
    {
    }

    function testDestroyFailsForEveryone()
    {
    }*/
}
