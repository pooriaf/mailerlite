@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Practice Introduction</div>
                    <div class="card-body">
                        <h3>
                            Greetings!
                        </h3>
                        <p>
                            I am Pooria, I am glad to have this test done for Mailerlite.
                            before anything, I want to express my feelings about Mailerlite and say It is so exciting
                            for me to be in this recruitment process.
                        </p>
                        <p>
                            This project is built based on <a href="https://gist.github.com/justinasposiunas/52f3c130c969834373dceae54d6b06fd
">this</a> task that sent for me.
                        </p>
                        <h3>
                            General things about what I have done
                        </h3>
                        <p>
                            These are some of them.
                        <ul>
                            <li>
                                Developing based on the TDD approach (I wrote tests first!) while I would definitely add
                                more tests for production apps.
                            </li>
                            <li>
                                Developing data model through migrations for table generations, Faker library and
                                Laravel Seeders to populate tables.
                            </li>
                            <li>
                                Using Eloquent as an elegant ORM to handle subscribers, fields and their relationship.
                            </li>
                            <li>
                                Using Laravel model properties to avoid unwanted reactivation of subscribers which the
                                task pointed.
                            </li>
                            <li>
                                Using some level of repository pattern to take advantage of eloquent in a more organized
                                matter.
                            </li>
                            <li>
                                Using Laravel API features like API Resources, API routes,... to create RESTful APIs.
                            </li>
                            <li>
                                Developing request validation through Laravel requests and validation, I built a custom
                                validation rule to validate emails against inactive hosts.
                            </li>
                            <li>
                                Developing subscribers manager as a decoupled class to make it reusable/replaceable in different ways as the task pointed.
                            </li>
                            <li>
                                Using Laravel container to bind subscribers manager service interface to the application
                                and injecting interface to the controller (Dependency Inversion, Dependency Injection)
                            </li>
                        </ul>
                        <p>
                            Thanks to PSR-4, The project organized in different directories in the app folder.
                        </p>

                        <h3>
                            Quick Access to Resources
                        </h3>
                        <div>
                            <b>IMPORTANT</b>: When making the request, It is necessary to send header info.
                            <br>
                            Accept: application/json
                            <br>
                            Content-Type: application/json
                        </div>
                        </p>
                        <div class="alert alert-secondary">
                            <p>
                            <h5>Get list of subscribers</h5>
                            GET <a href="{{ route('subscribers.index') }}">api/subscribers</a>
                            </p>
                            <p>
                            <h5>Store a subscriber</h5>
                            POST /subscribers
                            <div>
                                params:
                                name (required|validated), email (required|validated), any extra fields by title (must be defined before by fields API, unless they get bypassed)
                            </div>
                            </p>
                            <p>
                            <h5>Get a subscriber</h5>
                            GET api/subscribers/{id}
                            </p>
                            <p>
                            <h5>Update a subscriber</h5>
                            PATCH api/subscribers/{id}
                            <div>
                                params:
                                name (validated), email (validated), state (validated|active, unsubscribed, junk, bounced, unconfirmed), any extra fields by title (must be defined before by fields API, unless they get bypassed, previous extra fields should send again otherwise the get removed)
                            </div>
                            </p>
                            <p>
                            <h5>Delete a subscriber (resource | soft delete)</h5>
                            DELETE api/subscribers/{id}
                            </p>
                        </div>
                        <div class="alert alert-secondary">
                            <p>
                            <h5>Get list of fields</h5>
                            GET api/fields
                            </p>
                            <p>
                            <h5>Store a field</h5>
                            POST api/fields
                            <div>
                                params:
                                title (required|validated), type (required|validated|date, number, string, boolean)
                            </div>
                            </p>
                            <p>
                            <h5>Update a field</h5>
                            PATCH api/fields/{id}
                            <div>
                                params:
                                title (validated), type (validated|date, number, string, boolean)
                            </div>
                            </p>
                            <p>
                            <h5>Delete a field (resource | soft delete)</h5>
                            DELETE api/fields/{id}
                            </p>
                        </div>
                        </p>
                        <h6>Notes</h6>
                        <p>
                            There is no way to implicitly reactivate user, unless to send update request with active
                            state
                        </p>
                        <p>
                            by default for some lags in running test, I disabled the mail host checking on new user
                            subscription,
                            to enable it you can check Rules/ActiveEmailServer.php file and comment line 31
                        </p>
                        <p>
                            You can also run tests (./vendor/bin/phpunit) to populate tables (make sure you have
                            migrated
                            tables before)
                        </p>
                        <p>
                            All api/* URIs respond with 404 json error in the case of not found
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
