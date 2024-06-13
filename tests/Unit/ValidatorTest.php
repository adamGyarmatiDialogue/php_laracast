<?php

require "Validator.php";

it("validates a string", function () {
    expect(Validator::string("foobar"))->toBeTrue();
    expect(Validator::string(false))->toBeFalse();
    expect(Validator::string(""))->toBeFalse();
});

it("validates a string with minimum length", function () {
    expect(Validator::string("foobar", 20))->toBeFalse();
    expect(Validator::string("foobar", 2))->toBeTrue();
});

it("validates an email", function () {
    expect(Validator::email("foobar"))->toBeFalse();
    expect(Validator::email("foobar@example.com"))->toBeTrue();
});
