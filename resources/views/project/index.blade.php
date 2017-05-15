@extends('layouts.app')

@section('content')

<main>

    @include('project.welcome')

    <section class="well2 bg-secondary">
        <div class="container">
            <div class="owl-carousel">

                @foreach($projects as $project)

                <div class="item">

                    <div>
                        <img src="{{ url('images/'.$project->img) }}" alt=""/>

                        <h3 class="ttu">{{ $project->title }}</h3>

                        <p class="p__mod">{{ $project->lead }}</p>

                        <div class="preview_sum">
                            <div class="row">
                                <div class="col-md-6">
                                    <h6>Собрано:</h6>
                                </div>
                                <div class="col-md-6 text-right">
                                    <h5><span>{{$project->collected}}</span> грн</h5>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <h6>Необходимо:</h6>
                                </div>
                                <div class="col-md-6 text-right">
                                    <h5><span>{{$project->goal}}</span> грн</h5>
                                </div>
                            </div>
                        </div>

                        <div class="defaultprog" id="progressBar"><div></div></div>
                        <script>
                            var count = <?php echo ($project->collected*100)/$project->goal;?>

                        progressBar(count, $('#progressBar'));
                        </script>

                        <a href="{{ url('project', $project->id) }}" class="btn-link">Принять участие</a>
                    </div>

                </div>

                @endforeach
            </div>
        </div>
    </section>

    <section class="parallax" data-url="images/parallax1.jpg" data-mobile="true" data-speed="0.7">
        <div class="container">
            <div class="row">

                <blockquote class="blockquote1 center767">
                    <div class="col-md-4">
                        <cite class="md-add2">Bhagavad Gita:</cite>
                    </div>
                    <div class="col-md-8 border-add border-add__mod">
                        <q>"Fear not what is not real, never <br/> was and never will be. What is real, <br/> always
                            was and
                            cannot be <br/> destroyed."</q>
                    </div>
                </blockquote>
            </div>
        </div>
    </section>

    @include('project.tabs')


    <section class="well5">
        <div class="container">
            <h2 class="ttu">Gallery</h2>

            <div class="row offs">
                <div class="col-md-4 col-sm-4 col-xs-12">
                    <a class="thumb thumbnail2" data-fancybox-group="1" href="images/page-1_img08_original.jpg">
                        <img src="{{ url('images/page-1_img08.jpg') }}" alt=""/>

                        <span class="thumb_overlay"></span>
                    </a>
                </div>

                <div class="col-md-4 col-sm-4 col-xs-12">
                    <a class="thumb thumbnail2" data-fancybox-group="1" href="images/page-1_img09_original.jpg">
                        <img src="{{ url('images/page-1_img09.jpg') }}" alt=""/>

                        <span class="thumb_overlay"></span>
                    </a>
                </div>

                <div class="col-md-4 col-sm-4 col-xs-12">
                    <a class="thumb thumbnail2" data-fancybox-group="1" href="images/page-1_img10_original.jpg">
                        <img src="{{ url('images/page-1_img10.jpg') }}" alt=""/>

                        <span class="thumb_overlay"></span>
                    </a>
                </div>
            </div>

            <div class="row text-center">
                <div class="col-md-4 col-sm-4 col-xs-12">
                    <a class="thumb thumbnail2" data-fancybox-group="1" href="images/page-1_img11_original.jpg">
                        <img src="{{ url('images/page-1_img10.jpg') }}" alt=""/>

                        <span class="thumb_overlay"></span>
                    </a>
                </div>

                <div class="col-md-4 col-sm-4 col-xs-12">
                    <a class="thumb thumbnail2" data-fancybox-group="1" href="images/page-1_img12_original.jpg">
                        <img src="{{ url('images/page-1_img10.jpg') }}" alt=""/>

                        <span class="thumb_overlay"></span>
                    </a>
                </div>

                <div class="col-md-4 col-sm-4 col-xs-12">
                    <a class="thumb thumbnail2" data-fancybox-group="1" href="images/page-1_img13_original.jpg">
                        <img src="{{ url('images/page-1_img10.jpg') }}" alt=""/>

                        <span class="thumb_overlay"></span>
                    </a>
                </div>

                <a href="#" class="btn btn-default btn-sm">View all</a>
            </div>
        </div>
    </section>

    <section class="well6 bg-alt">
        <div class="container">
            <div class="row">
                <div class="owl-carousel2">
                    <div class="item text-center">
                        <blockquote class="blockquote2">
                            <p>“</p>

                            <div class="box">
                                <div class="box_aside">
                                    <img src="{{ url('images/page-1_img14.jpg') }}" alt=""/>
                                </div>
                                <div class="box_cnt box_cnt__no-flow">
                                    <q>Quisque nulla. Vestibulum libero nisl, porta vel, scelerisque eget, malesuada
                                        at, neque. Vivamus eget nibh. Etiam cursus leo vel metus. Nulla facilisi.
                                        Aenean nec eros. Vestibulum ante ipsum primis in faucibus orci luctus et
                                        ultrices posuere cubilia Curae spened leo. Ut pharetra augue nec augue. Nam
                                        elit magna, hendrerit sit amet.
                                    </q>
                                    <cite>Maria Pitcher, California.</cite>
                                </div>
                            </div>
                        </blockquote>

                    </div>

                    <div class="item">
                        <blockquote class="blockquote2">
                            <p>“</p>

                            <div class="box">
                                <div class="box_aside">
                                    <img src="images/page-1_img14.jpg" alt=""/>
                                </div>
                                <div class="box_cnt box_cnt__no-flow">
                                    <q>Vestibulum ante ipsum primis in faucibus orci luctus et
                                        ultrices posuere cubilia Curae spened leo.Quisque nulla. Vestibulum libero
                                        nisl, porta vel, scelerisque eget, malesuada
                                        at, neque. Vivamus eget nibh. Etiam cursus leo vel metus. Nulla facilisi.
                                        Aenean nec eros. Ut pharetra augue nec augue. Nam
                                        elit magna, hendrerit sit amet.
                                    </q>
                                    <cite>Linda Gibson, California.</cite>
                                </div>
                            </div>
                        </blockquote>

                    </div>

                    <div class="item">
                        <blockquote class="blockquote2">
                            <p>“</p>
                            <div class="box">
                                <div class="box_aside">
                                    <img src="images/page-1_img14.jpg" alt=""/>
                                </div>
                                <div class="box_cnt box_cnt__no-flow">
                                    <q>Quisque nulla. Vestibulum libero nisl, porta vel, scelerisque eget, malesuada
                                        at, neque. Vivamus eget nibh. Etiam cursus leo vel metus. Nulla facilisi.
                                        Aenean nec eros. Vestibulum ante ipsum primis in faucibus orci luctus et
                                        ultrices posuere cubilia Curae spened leo. Ut pharetra augue nec augue. Nam
                                        elit magna, hendrerit sit amet.
                                    </q>
                                    <cite>Monika Rollton, New York</cite>
                                </div>
                            </div>
                        </blockquote>
                    </div>
                </div>
            </div>
        </div>
    </section>

</main>

@stop