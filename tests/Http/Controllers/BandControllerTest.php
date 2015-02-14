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
        $this->assertInstanceOf('Illuminate\Database\Eloquent\Collection', $view['bands']);
        $this->assertCount(0, $view['bands']);

    }

    function testIndexHasBandsWhenDbSeeded()
    {
        $this->seed('TestBasicSeeder');

        $response = $this->action('GET', 'BandController@index');
        $view = $response->original;

        $this->assertResponseOk();
        $this->assertViewHas('bands');
        $this->assertNotEmpty($view['bands']);
    }

    function testIndexHasPaginatedBands()
    {
        // NB : TestSeeders insère 25 groupes
        $this->seed('TestsSeeder');

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
        //NB : TestBasicSeeder insère 3 utilisateurs et 3 groupes
        $this->seed('TestBasicSeeder');

        $response = $this->action('GET', 'BandController@show', ['band' => 1]);
        $view = $response->original;

        $this->assertResponseOk();
        $this->assertViewHas('band');
        $this->assertInstanceOf('App\Band', $view['band']);
    }

    function testShowFailsForNonExistingBand()
    {
        $this->seed('TestBasicSeeder');

        $this->action('GET', 'BandController@show', ['band' => 666]);
        $this->assertResponseStatus(404);
    }

    function testCreateFailsForGuest()
    {
        $this->action('GET', 'BandController@create');
        $this->assertRedirectedTo('auth/login');
    }

    function testStoreFailsForGuest()
    {
        $this->action('POST', 'BandController@store');
        $this->assertRedirectedTo('auth/login');
    }

    function testEditFailsForGuest()
    {
        $this->seed('TestBasicSeeder');

        $this->action('GET', 'BandController@edit', ['bands' => 1]);
        $this->assertRedirectedTo('auth/login');
    }

    function testUpdateFailsForGuest()
    {
        $this->seed('TestBasicSeeder');

        $this->action('PUT', 'BandController@update', ['bands' => 1]);
        $this->assertRedirectedTo('auth/login');
    }

    function testCreateWorksForUser()
    {
        $this->seed('TestBasicSeeder');

        $user = \App\User::find(1);
        $this->be($user);

        $this->action('GET', 'BandController@create');
        $this->assertResponseOk();
    }

    function testEditWorksForUser()
    {
        $this->seed('TestBasicSeeder');

        $user = \App\User::find(1);
        $this->be($user);

        $this->action('GET', 'BandController@edit', ['bands' => 1]);
        $this->assertResponseOk();
    }

    function testEditFailsForUserAndNonExistingBand()
    {
        $this->seed('TestBasicSeeder');

        $user = \App\User::find(1);
        $this->be($user);

        $this->action('GET', 'BandController@edit', ['bands' => 666]);

        $this->assertResponseStatus(404);
    }

   function testEditFailsForUserOtherThanCreator()
    {
        $this->seed('TestBasicSeeder');

        $user = \App\User::find(1);
        $this->be($user);

        $this->action('GET', 'BandController@edit', ['bands' => 2]);

        $this->assertResponseStatus(403);
    }

    function testUpdateFailsForUserOtherThanCreator()
    {
        $this->seed('TestBasicSeeder');

        $user = \App\User::find(1);
        $this->be($user);


        $data = ['name' => 'updated band 2'];
        $this->action('PUT', 'BandController@update', ['bands' => 2], $data);

        $this->assertResponseStatus(403);
    }

    function testStoreFailsForUserWithBadData()
    {
        $this->seed('TestBasicSeeder');

        $user = \App\User::find(1);
        $this->be($user);

        $data  = [];
        $this->action('POST', 'BandController@store', ['bands' => 1], $data);
        $this->assertRedirectedToAction('BandController@create');
        $this->assertViewHas('errors');
    }

    function testUpdateFailsForUserWithBadData()
    {
        $this->seed('TestBasicSeeder');

        $user = \App\User::find(1);
        $this->be($user);

        $data  = [];
        $this->action('POST', 'BandController@store', ['bands' => 1], $data);
        $this->assertRedirectedToAction('BandController@edit', array('bands' => 1));
        $this->assertViewHas('errors');
    }

    function testStoreWorksForUserWithGoodData()
    {
        $this->seed('TestBasicSeeder');

        $user = \App\User::find(1);
        $this->be($user);

        $data  = ['name' => 'my new band', 'active' => true, 'user_id' => $user->id];
        $this->action('POST', 'BandController@store', [], $data);
        $this->assertRedirectedToAction('BandController@index');
    }

    function testUpdateWorksForUserWithGoodData()
    {
        $this->seed('TestBasicSeeder');

        $user = \App\User::find(1);
        $this->be($user);

        $data  = ['name' => 'updated band 1', 'active' => false, 'biography' => 'lorem ipsum updated'];
        $this->action('POST', 'BandController@store', ['bands' => 1], $data);
        $this->assertRedirectedToAction('BandController@index');
    }

    function testDestroyFailsForEveryone()
    {
        $this->seed('TestBasicSeeder');

        $this->action('DELETE', 'BandController@store', ['bands' => 1]);
        $this->assertResponseStatus(405);

        $user = \App\User::find(1);
        $this->be($user);

        $this->action('DELETE', 'BandController@store', ['bands' => 1]);
        $this->assertResponseStatus(405);
    }
}
