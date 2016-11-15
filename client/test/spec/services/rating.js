'use strict';

describe('Service: rating', function () {

  // load the service's module
  beforeEach(module('clientApp'));

  // instantiate service
  var rating;
  beforeEach(inject(function (_rating_) {
    rating = _rating_;
  }));

  it('should do something', function () {
    expect(!!rating).toBe(true);
  });

});
