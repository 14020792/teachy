'use strict';

describe('Service: criteria', function () {

  // load the service's module
  beforeEach(module('clientApp'));

  // instantiate service
  var criteria;
  beforeEach(inject(function (_criteria_) {
    criteria = _criteria_;
  }));

  it('should do something', function () {
    expect(!!criteria).toBe(true);
  });

});
