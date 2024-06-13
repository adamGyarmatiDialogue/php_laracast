<?php

require "Container.php";

test('it can resolve something of the container', function () {
    // arrange
    $container = new Container();
    $container->bind("foo", fn () => "bar");

    // act
    $result = $container->resolve("foo");

    // assert/expect
    expect($result)->toEqual("bar");
});
