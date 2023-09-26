<section class="section" id="men">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="section-heading">
                        <h2>Men's Latest</h2>
                        <span>Details to details is what makes Hexashop different from the other themes.</span>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="men-item-carousel">
                        <div class="owl-men-item owl-carousel">



                        @foreach($mens_items as $men)
                            <div class="item">
                                <div class="thumb">
                                    <div class="hover-content">
                                        <ul>
                                            <li><button class="btn btn-info">Details</button></li>

                                            
                                            <form action="{{url('add_cart',$men->id)}}" method="POST">
                                                @csrf
                                            <li>
                                                <input type="number" name="quantity" value="1" min="1" style="width:50px;">
                                                <input type="submit" class="btn btn-danger" value="Add Cart">
                                            </li>
                                            </form>


                                        </ul>
                                    </div>
                                    <img width="300" height="350" src="product/{{$men->image}}" alt="">
                                </div>
                                <div class="down-content">
                                    <h4>{{$men->title}}</h4>

                                    @if($men->discount_price !=null)
                                    <span>Discount Price: ${{$men->discount_price}}</span>
                                    <span style="text-decoration: line-through; color:blue;">Price ${{$men->price}}</span>

                                    @else
                                    <span>Price ${{$men->price}}</span>

                                    @endif
                                 
                                </div>
                            </div>

                            @endforeach



                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>