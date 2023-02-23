<footer>
    <div class="container-footer">
        <div class="content-menu">
            <div class="dc-shop">
                <p>DC COMICS</p>
                <ul class="p-0">
                    @foreach ($menu_footer['comics'] as $key => $item)
                    <li><a href="">{{$key}}</a></li>
                    @endforeach
                    {{-- <li v-for="item in comics"><a href="#">{{item.label}}</a></li> --}}
                </ul>
                <p class="shop">SHOP</p>
                <ul class="p-0">
                    @foreach ($menu_footer['shop'] as $key => $item)
                    <li><a href="">{{$key}}</a></li>
                    @endforeach
                </ul>
            </div>
            <div class="dc margin-20">
                <p>DC</p>
                <ul class="p-0">
                    @foreach ($menu_footer['dc'] as $key => $item)
                    <li><a href="">{{$key}}</a></li>
                    @endforeach
                </ul>
            </div>
            <div class="sites margin-20">
                <p>SITES</p>
                <ul class="p-0">
                    @foreach ($menu_footer['sites'] as $key => $item)
                    <li><a href="">{{$key}}</a></li>
                    @endforeach
                </ul>
            </div>
        </div>
        <div class="row pb-5">
            <div class="col-12">
               <span>All Site Content TM and 2020 DC Entertainment, unless otherwise <a href="">noted here</a>. All rights reserved.</span>
               <p class="ms-2"><a  href="#">Cookie Settings</a></p>
            </div>
        </div>
    </div>
    <div class="container-social">
        <div class="row-social">
            <div class="sign-up">
                <button class="sign-btn">SIGN-UP NOW!</button>
            </div>
            <div class="social">
                <h4>FOLLOW US</h4> 
                <ul>
                    @foreach ($menu_footer['img_social'] as $item)
                    <li>
                        <a href="#">
                            <img src="{{ asset(Vite::asset('resources/img/'.$item)) }}" alt="social">
                        </a>
                    </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
</footer>