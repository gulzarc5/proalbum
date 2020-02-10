@extends('admin.template.admin_master')

@section('content')

<div class="right_col" role="main">

    <div class="">
      
      <div class="clearfix"></div>

      <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
          <div class="x_panel">
            <div class="x_title">
              <h2>Product View</h2>
              <div class="clearfix"></div>
            </div>
            <div class="x_content">

              <div class="col-md-8 col-sm-5 col-xs-12" style="border:0px solid #e5e5e5;">
                <h3 class="prod_title">LOWA Men’s Renegade GTX Mid Frame</h3>
                <p>Raw denim you probably haven't heard of them jean shorts Austin. Nesciunt tofu stumptown aliqua butcher retro keffiyeh dreamcatcher synth. Cosby sweater eu banh mi, qui irure terr.</p>
                <div class="row product-view-tag">
                    <h5 class="col-md-6 col-sm-6 col-xs-12"><strong>Product Code:</strong> PRO-1</h5>
                    <h5 class="col-md-6 col-sm-6 col-xs-12"><strong>Catagory:</strong> Wedding Frames</h5>
                    <h5 class="col-md-6 col-sm-6 col-xs-12"><strong>Unit:</strong> CM</h5>
                    <h5 class="col-md-6 col-sm-6 col-xs-12"><strong>Dpi:</strong> 45</h5>
                    <h5 class="col-md-6 col-sm-6 col-xs-12"><strong>Size:</strong> 12 x 12</h5>
                    <h5 class="col-md-6 col-sm-6 col-xs-12"><strong>Extra Page Price:</strong> $ 100</h5>
                    <h5 class="col-md-4 col-sm-4 col-xs-12"><strong>Product Type Name:</strong> Price</h5>
                    <h5 class="col-md-4 col-sm-4 col-xs-12"><strong>Product Type Quantity:</strong> 12</h5>
                    <h5 class="col-md-4 col-sm-4 col-xs-12"><strong>Product Type Price:</strong> $ 100</h5>
                </div>
                <br />
                <div style="margin-top: 30px;" role="tabpanel" data-example-id="togglable-tabs">
                  <ul id="myTab" class="nav nav-tabs bar_tabs" role="tablist">
                    <li role="presentation" class="active"><a href="#tab_content1" role="tab" id="home-tab" data-toggle="tab" aria-expanded="true">Color</a>
                    </li>
                    <li role="presentation" class=""><a href="#tab_content2" role="tab" id="profile-tab" data-toggle="tab" aria-expanded="false">Page</a>
                    </li>
                    <li role="presentation" class=""><a href="#tab_content3" role="tab" id="profile-tab2" data-toggle="tab" aria-expanded="false">Paper</a>
                    </li>
                  </ul>
                  <div id="myTabContent" class="tab-content">
                    <div role="tabpanel" class="tab-pane fade active in" id="tab_content1" aria-labelledby="home-tab">
                      <div class="x_title" style="margin-bottom: 0;border-bottom: 0px solid #E6E9ED;">
                        <h4 style="width: 70%;float: left;"><strong>Color List</strong></h4>
                      </div>
                      <div class="x_content">

                        <table class="table table-hover">
                          <thead>
                            <tr>
                              <th class="wd-150">Name</th>
                              <th class="option-size-price"><b>Size</b><b>Price</b></th>
                              <th>Image</th>
                            </tr>
                          </thead>
                          <tbody>
                            <tr>
                              <td class="wd-150">Mark</td>
                              <td class="wd-200">
                                <div class="option-size-price">
                                  <b>12 x 12</b>
                                  <b>$ 100</b>
                                </div>
                                <div class="option-size-price">
                                  <b>12 x 12</b>
                                  <b>$ 100</b>
                                </div>
                              </td>
                              <td><img src="{{asset('web/images/photo/3.jpg')}}" class="option-img" alt="icon"></td>
                            </tr>
                            <tr>
                              <td class="wd-150">Mark</td>
                              <td class="wd-300">
                                <div class="option-size-price">
                                  <b>12 x 12</b>
                                  <b>$ 100</b>
                                </div>
                                <div class="option-size-price">
                                  <b>12 x 12</b>
                                  <b>$ 100</b>
                                </div>
                              </td>
                              <td><img src="{{asset('web/images/photo/3.jpg')}}" class="option-img" alt="icon"></td>
                            </tr>
                          </tbody>
                        </table>
                      </div>
                    </div>
                    <div role="tabpanel" class="tab-pane fade" id="tab_content2" aria-labelledby="profile-tab">
                      <div class="x_title" style="margin-bottom: 0;border-bottom: 0px solid #E6E9ED;">
                        <h4 style="width: 70%;float: left;"><strong>Page List</strong></h4>
                      </div>
                      <div class="x_content">

                        <table class="table table-hover">
                          <thead>
                            <tr>
                              <th class="wd-150">Name</th>
                              <th class="option-size-price"><b>Size</b><b>Price</b></th>
                              <th>Image</th>
                              <th>Action</th>
                            </tr>
                          </thead>
                          <tbody>
                            <tr>
                              <td class="wd-150">Jacob</td>
                              <td class="wd-300">
                                <div class="option-size-price">
                                  <b>12 x 12</b>
                                  <b>$ 100</b>
                                </div>
                                <div class="option-size-price">
                                  <b>12 x 12</b>
                                  <b>$ 100</b>
                                </div>
                              </td>
                              <td><img src="{{asset('web/images/photo/3.jpg')}}" class="option-img" alt="icon"></td>
                            </tr>
                            <tr>
                              <td class="wd-150">Mark</td>
                              <td class="wd-300">
                                <div class="option-size-price">
                                  <b>12 x 12</b>
                                  <b>$ 100</b>
                                </div>
                                <div class="option-size-price">
                                  <b>12 x 12</b>
                                  <b>$ 100</b>
                                </div>
                              </td>
                              <td><img src="{{asset('web/images/photo/3.jpg')}}" class="option-img" alt="icon"></td>
                            </tr>
                          </tbody>
                        </table>
                      </div>
                    </div>
                    <div role="tabpanel" class="tab-pane fade" id="tab_content3" aria-labelledby="profile-tab">
                      <div class="x_title" style="margin-bottom: 0;border-bottom: 0px solid #E6E9ED;">
                        <h4 style="width: 70%;float: left;"><strong>Paper List</strong></h4>
                      </div>
                      <div class="x_content">

                        <table class="table table-hover">
                          <thead>
                            <tr>
                              <th class="wd-150">Name</th>
                              <th class="option-size-price"><b>Size</b><b>Price</b></th>
                              <th>Image</th>
                              <th>Action</th>
                            </tr>
                          </thead>
                          <tbody>
                            <tr>
                              <td class="wd-150">Mark</td>
                              <td class="wd-300">
                                <div class="option-size-price">
                                  <b>12 x 12</b>
                                  <b>$ 100</b>
                                </div>
                                <div class="option-size-price">
                                  <b>12 x 12</b>
                                  <b>$ 100</b>
                                </div>
                              </td>
                              <td><img src="{{asset('web/images/photo/3.jpg')}}" class="option-img" alt="icon"></td>
                            </tr>
                          </tbody>
                        </table>
                      </div>
                    </div>
                  </div>
                </div>
                
              </div>

              <div class="col-md-4 col-sm-7 col-xs-12">
                <div class="product-image">
                  <img src="{{asset('web/images/photo/1.jpg')}}" alt="..." />
                </div>
                <div class="product_gallery">
                  <a>
                    <img src="{{asset('web/images/photo/2.jpg')}}" alt="..." />
                  </a>
                  <a>
                    <img src="{{asset('web/images/photo/3.jpg')}}" alt="..." />
                  </a>
                  <a>
                    <img src="{{asset('web/images/photo/4.jpg')}}" alt="..." />
                  </a>
                  <a>
                    <img src="{{asset('web/images/photo/5.jpg')}}" alt="..." />
                  </a>
                </div>
              </div>

              <div class="col-md-12">

                <div class="product_price">
                  <h3 style="margin: 0">Product Description</h3><hr style="margin: 10px 0;border-top: 1px solid #ddd;">
                  <h5 style="margin-bottom: 5px"><strong>Description Tittle:</strong> This is how you describe a product</h5>
                  <p>Raw denim you probably haven't heard of them jean shorts Austin. Nesciunt tofu stumptown aliqua butcher retro keffiyeh dreamcatcher synth. Cosby sweater eu banh mi, qui irure terr. Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum</p>
                </div>

              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- /page content -->

 @endsection