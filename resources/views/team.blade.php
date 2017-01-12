@extends('layouts.app')

@section('title', 'The Team')

@section('content')
    <!-- About Section -->
    <section class="about">
        <div class="container">
            <h1 class="about__title">The forLoop Team</h1>
            <p class="about__content">forLoop was founded by Ridwan Olalere and is supported by a group of passionate technology enthusiasts.</p>
        </div>
    </section>

    <!-- Teams Section -->
    <section class="teams">
        <div class="team__list">
            <!-- Teams List Item -->
            <div class="team__list__item position-relative" style="background-image: url('img/1.png')">
                <div class="team__list__item__container">
                    <div class="team__list__item__name">Imogie Mubarak</div>
                    <div class="team__list__item__handle">
                        <div class="handle__icon">
                            <svg class="icon-social-twitter icon-sm"><use xlink:href="img/icons.svg#icon-social-twitter"></use></svg>
                        </div>
                        <div class="handle__text">@imogiemubarak</div>
                    </div>
                </div>
            </div>
            <!-- Teams List Item -->
            <div class="team__list__item position-relative" style="background-image: url('img/2.png')">
                <div class="team__list__item__container">
                    <div class="team__list__item__name">Imogie Mubarak</div>
                    <div class="team__list__item__handle">
                        <div class="handle__icon">
                            <svg class="icon-social-twitter icon-sm"><use xlink:href="img/icons.svg#icon-social-twitter"></use></svg>
                        </div>
                        <div class="handle__text">@imogiemubarak</div>
                    </div>
                </div>
            </div>
            <!-- Teams List Item -->
            <div class="team__list__item position-relative" style="background-image: url('img/3.png')">
                <div class="team__list__item__container">
                    <div class="team__list__item__name">Imogie Mubarak</div>
                    <div class="team__list__item__handle">
                        <div class="handle__icon">
                            <svg class="icon-social-twitter icon-sm"><use xlink:href="img/icons.svg#icon-social-twitter"></use></svg>
                        </div>
                        <div class="handle__text">@imogiemubarak</div>
                    </div>
                </div>
            </div>
            <!-- Teams List Item -->
            <div class="team__list__item position-relative" style="background-image: url('img/5.png')">
                <div class="team__list__item__container">
                    <div class="team__list__item__name">Imogie Mubarak</div>
                    <div class="team__list__item__handle">
                        <div class="handle__icon">
                            <svg class="icon-social-twitter icon-sm"><use xlink:href="img/icons.svg#icon-social-twitter"></use></svg>
                        </div>
                        <div class="handle__text">@imogiemubarak</div>
                    </div>
                </div>
            </div>
            <!-- Teams List Item -->
            <div class="team__list__item position-relative" style="background-image: url('img/6.png')">
                <div class="team__list__item__container">
                    <div class="team__list__item__name">Imogie Mubarak</div>
                    <div class="team__list__item__handle">
                        <div class="handle__icon">
                            <svg class="icon-social-twitter icon-sm"><use xlink:href="img/icons.svg#icon-social-twitter"></use></svg>
                        </div>
                        <div class="handle__text">@imogiemubarak</div>
                    </div>
                </div>
            </div>
            <!-- Teams List Item -->
            <div class="team__list__item position-relative" style="background-image: url('img/7.png')">
                <div class="team__list__item__container">
                    <div class="team__list__item__name">Imogie Mubarak</div>
                    <div class="team__list__item__handle">
                        <div class="handle__icon">
                            <svg class="icon-social-twitter icon-sm"><use xlink:href="img/icons.svg#icon-social-twitter"></use></svg>
                        </div>
                        <div class="handle__text">@imogiemubarak</div>
                    </div>
                </div>
            </div>
            <!-- Teams List Item -->
            <div class="team__list__item position-relative" style="background-image: url('img/10.png')">
                <div class="team__list__item__container">
                    <div class="team__list__item__name">Imogie Mubarak</div>
                    <div class="team__list__item__handle">
                        <div class="handle__icon">
                            <svg class="icon-social-twitter icon-sm"><use xlink:href="img/icons.svg#icon-social-twitter"></use></svg>
                        </div>
                        <div class="handle__text">@imogiemubarak</div>
                    </div>
                </div>
            </div>
            <!-- Teams List Item -->
            <div class="team__list__item position-relative" style="background-image: url('img/11.png')">
                <div class="team__list__item__container">
                    <div class="team__list__item__name">Imogie Mubarak</div>
                    <div class="team__list__item__handle">
                        <div class="handle__icon">
                            <svg class="icon-social-twitter icon-sm"><use xlink:href="img/icons.svg#icon-social-twitter"></use></svg>
                        </div>
                        <div class="handle__text">@imogiemubarak</div>
                    </div>
                </div>
            </div>
            <!-- Teams List Item -->
            <div class="team__list__item position-relative" style="background-image: url('img/12.png')">
                <div class="team__list__item__container">
                    <div class="team__list__item__name">Imogie Mubarak</div>
                    <div class="team__list__item__handle">
                        <div class="handle__icon">
                            <svg class="icon-social-twitter icon-sm"><use xlink:href="img/icons.svg#icon-social-twitter"></use></svg>
                        </div>
                        <div class="handle__text">@imogiemubarak</div>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <!-- Jumbotron -->
    <section class="jumbotron">
        <div class="container">
            <h2 class="jumbotron__title jumbotron__title--2">Get notified about Upcoming Meetups</h2>
            <div class="jumbotron__action jumbotron__action--maxsize">
                <form action="" class="form">
                    <div class="outer-container">
                        <div class="input-section">
                            <input type="text" class="form__input" placeholder="Email Address" />
                        </div>
                        <div class="submit-button">
                            <button type="submit" class="btn btn--primary btn--block">Notify Me</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>
@endsection
