@extends('layouts.app')

@section('content')

<div class="view_content">
    <div class="container">
        <div class="row header_content">
            <div class="col-md-6">
                <img src="{{ url('images/project_img_altar_protection.jpg') }}" alt="">
            </div>
            <div class="col-md-6 info_project">
                <h3>{{ $project->title }}</h3>
                <div class="separator"></div>
                <div class="countto">
                    <h2 class="text-center">{{ $project->collected }}</h2>
                </div>
                <div class="min-separator"></div>
                <p class="text-center">Собрано из {{$project->goal}} .00</p>
                <div class="countTo"></div>
            </div>
        </div>

        <div class="row center_content">

            <div class="col-md-6">
                <div class="panel panel-default">
                    <div class="panel-body">
                        Basic panel example
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <h3>Мой вклад в проект ( грн. ):</h3>
                <form id="fake-form">
                    <div class="form-group">

                        {!! Form::text('sum', '1080', ['class' => 'form-control']) !!}
                    </div>
                    <div class="form-group">
                        <button class='btn btn-primary' name="donateBut">Принять участие</button>
                    </div>
                </form>

                <div class="socialite"></div>
            </div>
        </div>


        <div id='liqpay_checkout'></div>
        <div class="row center_form">
            {!! Form::open(['url' => 'payment', 'id' => 'donate-form', 'class' => 'form-horizontal']) !!}
            <input type="hidden" name="sum">
            <div class="form-group">
                <div class="col-sm-6">
                    <input type="text" name="name" placeholder="Ваше имя" class="form-control">
                </div>
                <div class="col-sm-6">
                    <input type="text" name="female" placeholder="Фамилия" class="form-control">
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                    <div class="checkbox">
                        <label>
                            <input type="checkbox"> Пожертвовать анонимно
                        </label>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                    <input type="submit" class="btn btn-primary form-control" value="Перейти к оплате">
                </div>
            </div>
            {!! Form::close() !!}
        </div>


        <div class="row">
            <div class="separator"></div>
        </div>


        @include('project.tabs')

        <div class="contributions">
            <table class="table">
                <thead class="thead-inverse">
                <tr>
                    <th>#</th>
                    <th>Участник</th>
                    <th>Сумма</th>
                    <th>Дата</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <th scope="row">1</th>
                    <td>Mark</td>
                    <td>Otto</td>
                    <td>@mdo</td>
                </tr>
                <tr>
                    <th scope="row">2</th>
                    <td>Jacob</td>
                    <td>Thornton</td>
                    <td>@fat</td>
                </tr>
                <tr>
                    <th scope="row">3</th>
                    <td>Larry</td>
                    <td>the Bird</td>
                    <td>@twitter</td>
                </tr>
                <tr>
                    <th scope="row">3</th>
                    <td>Larry</td>
                    <td>the Bird</td>
                    <td>@twitter</td>
                </tr><tr>
                    <th scope="row">3</th>
                    <td>Larry</td>
                    <td>the Bird</td>
                    <td>@twitter</td>
                </tr>
                <tr>
                    <th scope="row">3</th>
                    <td>Larry</td>
                    <td>the Bird</td>
                    <td>@twitter</td>
                </tr>
                <tr>
                    <th scope="row">3</th>
                    <td>Larry</td>
                    <td>the Bird</td>
                    <td>@twitter</td>
                </tr><tr>
                    <th scope="row">3</th>
                    <td>Larry</td>
                    <td>the Bird</td>
                    <td>@twitter</td>
                </tr><tr>
                    <th scope="row">3</th>
                    <td>Larry</td>
                    <td>the Bird</td>
                    <td>@twitter</td>
                </tr>

                </tbody>
            </table>
            <nav class="pagination-nav" aria-label="Page navigation">
                <ul class="pagination">
                    <li>
                        <a href="#" aria-label="Previous">
                            <span aria-hidden="true">&laquo;</span>
                        </a>
                    </li>
                    <li class="active"><a href="#">1</a></li>
                    <li><a href="#">2</a></li>
                    <li><a href="#">3</a></li>
                    <li><a href="#">4</a></li>
                    <li><a href="#">5</a></li>
                    <li>
                        <a href="#" aria-label="Next">
                            <span aria-hidden="true">&raquo;</span>
                        </a>
                    </li>
                </ul>
            </nav>
            <div class="separator"></div>
        </div>


        <div id="product-reviews-wrap">
            <div class="container">
                <div id="reviews" class="row">
                    <div id="comments" class="col-sm-7">
                        <div class="title-wrap">
                            <h3 class="spb-heading"><span>Отзывы <span class="count">0</span></span></h3>
                        </div>


                        <p class="woocommerce-noreviews">В этом проекте пока нет отзывов. Вы можете поделиться своими впечатлениями первым!</p>

                    </div>


                    <div id="review_form_wrapper" class="col-sm-5">
                        <div class="title-wrap">
                            <h3 class="spb-heading"><span>Поделитесь своими впечатлениями</span></h3>
                        </div>
                        <div id="review_form">
                            <div id="respond" class="comment-respond">
                                <h3 id="reply-title" class="comment-reply-title">Be the first to review “Защита алтаря в храме «Новая Навадвипа», г. Киев” <small><a rel="nofollow" id="cancel-comment-reply-link" href="/projects/archana/altar-protection/#respond" style="display:none;">Отменить ответ</a></small></h3>			<form action="https://dana.services/wp-comments-post.php" method="post" id="commentform" class="comment-form">
                                    <p class="comment-form-comment"><label for="comment">Ваш отзыв</label><textarea id="comment" name="comment" cols="45" rows="8" aria-required="true" placeholder="Ваш отзыв"></textarea></p><p class="comment-form-author"><label for="author">Имя <span class="required">*</span></label> <input id="author" name="author" type="text" placeholder="Имя" value="" size="30" aria-required="true"></p>
                                    <p class="comment-form-email"><label for="email">E-mail <span class="required">*</span></label> <input id="email" name="email" type="text" placeholder="E-mail" value="" size="30" aria-required="true"></p>
                                    <p class="form-submit"><input name="submit" type="submit" id="submit" class="submit" value="Добавить мой отзыв"> <input type="hidden" name="comment_post_ID" value="613" id="comment_post_ID">
                                        <input type="hidden" name="comment_parent" id="comment_parent" value="0">
                                    </p>			</form>
                            </div><!-- #respond -->
                        </div>
                    </div>


                    <div class="clear"></div>
                </div>
            </div>
        </div>

    </div>
</div>
@stop    