<template>
    <div class="row gutter-xs">
            <div class="col-md-6">
              <div id="www" class="card" aria-expanded="true">
                <div class="card-header">
                  <div class="card-actions">
                    <button type="button" class="collapse in" title="Collapse" data-toggle="collapse"  data-parent="#www" aria-expanded="true"></button>
                  </div>
                  <strong>Basic Table</strong>
                </div>
                <div class="card-body" data-toggle="match-height" style="height: 262px; display: block;">
                  <table class="table">
                    <thead>
                      <tr>
                        <th>#</th>
                        <th>Campaign Name</th>
                        <th>Link Clicks</th>
                        <th>Reach</th>
                        <th>Status</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td>1</td>
                        <td>Website traffic</td>
                        <td>11,706</td>
                        <td>58,530</td>
                        <td>
                          <span class="label label-outline-success">Active</span>
                        </td>
                      </tr>
                      <tr>
                        <td>2</td>
                        <td>Remarketing</td>
                        <td>15,860</td>
                        <td>79,300</td>
                        <td>
                          <span class="label label-outline-success">Active</span>
                        </td>
                      </tr>
                      <tr>
                        <td>3</td>
                        <td>Page Likes</td>
                        <td>11,688</td>
                        <td>58,440</td>
                        <td>
                          <span class="label label-outline-success">Active</span>
                        </td>
                      </tr>
                      <tr>
                        <td>4</td>
                        <td>Email Signups</td>
                        <td>13,049</td>
                        <td>65,245</td>
                        <td>
                          <span class="label label-outline-info">Pending</span>
                        </td>
                      </tr>
                      <tr>
                        <td>5</td>
                        <td>Product catalog</td>
                        <td>18,884</td>
                        <td>94,423</td>
                        <td>
                          <span class="label label-outline-danger">Inactive</span>
                        </td>
                      </tr>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
            <div class="col-md-6">
              <div class="card">
        <script src="/js/demo.min.js"></script>
                <div class="card-header">
                  <div class="card-actions">
                    <button type="button" class="card-action card-toggler" title="Collapse" aria-expanded="true"></button>
                    <button type="button" class="card-action card-reload" title="Reload"></button>
                    <button type="button" class="card-action card-remove" title="Remove"></button>
                  </div>
                  <strong>Hover Table (Align: left, right, center)</strong>
                </div>
                <div class="card-body" data-toggle="match-height" style="height: 262px;">
                  <table class="table table-hover">
                    <thead>
                      <tr>
                        <th class="text-left">#</th>
                        <th class="text-left">Campaign Name</th>
                        <th class="text-right">Link Clicks</th>
                        <th class="text-right">Reach</th>
                        <th class="text-center">Performance</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td class="text-left">1</td>
                        <td class="text-left">Website traffic</td>
                        <td class="text-right">11,706</td>
                        <td class="text-right">58,530</td>
                        <td class="text-center">
                          <span data-peity="line" style="display: none;">5,3,9,6,5,9,7,3,5,2</span><svg class="peity" height="16" width="32"><polygon fill="#c6d9fd" points="0 15.5 0 7.166666666666666 3.5555555555555554 10.5 7.111111111111111 0.5 10.666666666666666 5.5 14.222222222222221 7.166666666666666 17.77777777777778 0.5 21.333333333333332 3.833333333333334 24.888888888888886 10.5 28.444444444444443 7.166666666666666 32 12.166666666666668 32 15.5"></polygon><polyline fill="none" points="0 7.166666666666666 3.5555555555555554 10.5 7.111111111111111 0.5 10.666666666666666 5.5 14.222222222222221 7.166666666666666 17.77777777777778 0.5 21.333333333333332 3.833333333333334 24.888888888888886 10.5 28.444444444444443 7.166666666666666 32 12.166666666666668" stroke="#4d89f9" stroke-width="1" stroke-linecap="square"></polyline></svg>
                        </td>
                      </tr>
                      <tr>
                        <td class="text-left">2</td>
                        <td class="text-left">Remarketing</td>
                        <td class="text-right">15,860</td>
                        <td class="text-right">79,300</td>
                        <td class="text-center">
                          <span data-peity="line" style="display: none;">4,9,6,7,3,1,2,5,6,8</span><svg class="peity" height="16" width="32"><polygon fill="#c6d9fd" points="0 15.5 0 8.833333333333334 3.5555555555555554 0.5 7.111111111111111 5.5 10.666666666666666 3.833333333333334 14.222222222222221 10.5 17.77777777777778 13.833333333333334 21.333333333333332 12.166666666666668 24.888888888888886 7.166666666666666 28.444444444444443 5.5 32 2.166666666666668 32 15.5"></polygon><polyline fill="none" points="0 8.833333333333334 3.5555555555555554 0.5 7.111111111111111 5.5 10.666666666666666 3.833333333333334 14.222222222222221 10.5 17.77777777777778 13.833333333333334 21.333333333333332 12.166666666666668 24.888888888888886 7.166666666666666 28.444444444444443 5.5 32 2.166666666666668" stroke="#4d89f9" stroke-width="1" stroke-linecap="square"></polyline></svg>
                        </td>
                      </tr>
                      <tr>
                        <td class="text-left">3</td>
                        <td class="text-left">Page Likes</td>
                        <td class="text-right">11,688</td>
                        <td class="text-right">58,440</td>
                        <td class="text-center">
                          <span data-peity="line" style="display: none;">1,2,1,6,8,9,5,4,7,3</span><svg class="peity" height="16" width="32"><polygon fill="#c6d9fd" points="0 15.5 0 13.833333333333334 3.5555555555555554 12.166666666666668 7.111111111111111 13.833333333333334 10.666666666666666 5.5 14.222222222222221 2.166666666666668 17.77777777777778 0.5 21.333333333333332 7.166666666666666 24.888888888888886 8.833333333333334 28.444444444444443 3.833333333333334 32 10.5 32 15.5"></polygon><polyline fill="none" points="0 13.833333333333334 3.5555555555555554 12.166666666666668 7.111111111111111 13.833333333333334 10.666666666666666 5.5 14.222222222222221 2.166666666666668 17.77777777777778 0.5 21.333333333333332 7.166666666666666 24.888888888888886 8.833333333333334 28.444444444444443 3.833333333333334 32 10.5" stroke="#4d89f9" stroke-width="1" stroke-linecap="square"></polyline></svg>
                        </td>
                      </tr>
                      <tr>
                        <td class="text-left">4</td>
                        <td class="text-left">Email Signups</td>
                        <td class="text-right">13,049</td>
                        <td class="text-right">65,245</td>
                        <td class="text-center">
                          <span data-peity="line" style="display: none;">2,7,0,4,6,1,8,5,9,3</span><svg class="peity" height="16" width="32"><polygon fill="#c6d9fd" points="0 15.5 0 12.166666666666668 3.5555555555555554 3.833333333333334 7.111111111111111 15.5 10.666666666666666 8.833333333333334 14.222222222222221 5.5 17.77777777777778 13.833333333333334 21.333333333333332 2.166666666666668 24.888888888888886 7.166666666666666 28.444444444444443 0.5 32 10.5 32 15.5"></polygon><polyline fill="none" points="0 12.166666666666668 3.5555555555555554 3.833333333333334 7.111111111111111 15.5 10.666666666666666 8.833333333333334 14.222222222222221 5.5 17.77777777777778 13.833333333333334 21.333333333333332 2.166666666666668 24.888888888888886 7.166666666666666 28.444444444444443 0.5 32 10.5" stroke="#4d89f9" stroke-width="1" stroke-linecap="square"></polyline></svg>
                        </td>
                      </tr>
                      <tr>
                        <td class="text-left">5</td>
                        <td class="text-left">Product catalog</td>
                        <td class="text-right">18,884</td>
                        <td class="text-right">94,423</td>
                        <td class="text-center">
                          <span data-peity="line" style="display: none;">9,4,3,1,7,8,0,2,6,5</span><svg class="peity" height="16" width="32"><polygon fill="#c6d9fd" points="0 15.5 0 0.5 3.5555555555555554 8.833333333333334 7.111111111111111 10.5 10.666666666666666 13.833333333333334 14.222222222222221 3.833333333333334 17.77777777777778 2.166666666666668 21.333333333333332 15.5 24.888888888888886 12.166666666666668 28.444444444444443 5.5 32 7.166666666666666 32 15.5"></polygon><polyline fill="none" points="0 0.5 3.5555555555555554 8.833333333333334 7.111111111111111 10.5 10.666666666666666 13.833333333333334 14.222222222222221 3.833333333333334 17.77777777777778 2.166666666666668 21.333333333333332 15.5 24.888888888888886 12.166666666666668 28.444444444444443 5.5 32 7.166666666666666" stroke="#4d89f9" stroke-width="1" stroke-linecap="square"></polyline></svg>
                        </td>
                      </tr>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
  </template>

  <script>
    module.exports = {
      data: function () {
        return {}
      },
      methods:{
      beforeToggle : function(){
        console.log('siema')
      }
      }
    }
</script>