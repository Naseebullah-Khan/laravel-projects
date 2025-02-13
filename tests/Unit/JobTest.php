<?php

use App\Models\Employer;
use App\Models\Job;

it('belongs to an employer', function () {
    # We have three steps for writing test
    # 1. Arrange: Create the World
    $employer = Employer::factory()->create();
    $job = Job::factory()->create([
        "employer_id" => $employer->id,
    ]);
    # 2. Act: Interact with the world in a way that would be ideal
    $is_the_job_belongs_to_that_employer = $job->employer->is($employer);
    # 3. Assert: Assert that this works the way I would expect
    expect($is_the_job_belongs_to_that_employer)->toBeTrue();
});

it('it can have tags', function () {
    # We have three steps for writing test
    # 1. Arrange: Create the World
    $job = Job::factory()->create();
    # 2. Act: Interact with the world in a way that would be ideal
    $job->tag("Frontend");
    # 3. Assert: Assert that this works the way I would expect
    expect($job->tags)->toHaveCount(1);
});
