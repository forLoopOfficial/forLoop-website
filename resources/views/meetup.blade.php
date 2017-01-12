@extends('layouts.app')

@section('title', 'Meet up')

@section('content')
    <!-- Hero -->
    <section class="hero hero--2">
        <div class="container">
            <h1 class="hero__title hero__title--2 text-center">Find a Meetup</h1>
        </div>
    </section>

    <div class="tab__section">
        <!-- tabs -->
        <div class="tab-nav">
            <div class="tab-nav__item active">
                <a href="#upcomingMeetups" role="tab" data-toggle="tab" class="tab-nav__link">Upcoming Meetups</a>
            </div>
            <div class="tab-nav__item">
                <a href="#archivedMeetups" role="tab" data-toggle="tab" class="tab-nav__link">Archived Meetups</a>
            </div>
        </div>


        <div class="container">
            <!-- Tab contents -->
            <div class="tab-content">
                <!-- Upcoming Meetups -->
                <div id="upcomingMeetups" class="tab-content__item active">

                    <div class="outer-container">
                        <!-- Meeting Item -->
                        <div class="meeting__item">
                            <div class="meeting__item__content">
                                <div class="meeting__item__content__top">
                                    <a href="" class="meeting__item__title">Using Flutterwave APIs</a>
                                    <p class="meeting__item__location">Howellside</p>
                                    <p class="meeting__item__date">16 Sep 2016</p>
                                </div>

                                <div class="meeting__item__host">
                                    <div class="meeting__item__host__avatar">
                                        <img src="https://s3.amazonaws.com/uifaces/faces/twitter/csswizardry/128.jpg" alt="" class="img-circle inline-block" width="40" height="40">
                                    </div>
                                    <div class="meeting__item__host__caption">Hosted by Stephen Shaw</div>
                                </div>
                            </div>
                            <a href="" class="meeting__item__resource">
                                <span class="meeting__item__resource__text">Add to Calendar</span>
                                <span class="meeting__item__resource__icon">
                                    <svg class="icon-calendar-o icon-ss"><use xlink:href="img/icons.svg#icon-calendar-o"></use></svg>
                                </span>
                            </a>
                        </div>
                        <!-- Meeting Item -->
                        <div class="meeting__item">
                            <div class="meeting__item__content">
                                <div class="meeting__item__content__top">
                                    <a href="" class="meeting__item__title">Using Flutterwave APIs</a>
                                    <p class="meeting__item__location">Howellside</p>
                                    <p class="meeting__item__date">16 Sep 2016</p>
                                </div>

                                <div class="meeting__item__host">
                                    <div class="meeting__item__host__avatar">
                                        <img src="https://s3.amazonaws.com/uifaces/faces/twitter/csswizardry/128.jpg" alt="" class="img-circle inline-block" width="40" height="40">
                                    </div>
                                    <div class="meeting__item__host__caption">Hosted by Stephen Shaw</div>
                                </div>
                            </div>
                            <a href="" class="meeting__item__resource">
                                <span class="meeting__item__resource__text">Add to Calendar</span>
                                <span class="meeting__item__resource__icon">
                                    <svg class="icon-calendar-o icon-ss"><use xlink:href="img/icons.svg#icon-calendar-o"></use></svg>
                                </span>
                            </a>
                        </div>
                        <!-- Add new meetup -->
                        <div class="meeting__item meeting__item--dashed">
                            <div class="meeting__item__add text-center">
                                <div class="meeting__item__icon">
                                    <svg class="icon-plus"><use xlink:href="img/icons.svg#icon-plus"></use></svg>
                                </div>
                                <div class="meeting__item__caption">Organize a Meetup</div>
                            </div>
                        </div>
                    </div>

                </div>
                <!-- Archived Meetups -->
                <div id="archivedMeetups" class="tab-content__item">

                    <div class="outer-container">
                        <!-- Meeting Item -->
                        <div class="meeting__item">
                            <div class="meeting__item__content">
                                <div class="meeting__item__content__top">
                                    <a href="" class="meeting__item__title">Using Flutterwave APIs</a>
                                    <p class="meeting__item__location">Howellside</p>
                                    <p class="meeting__item__date">16 Sep 2016</p>
                                </div>

                                <div class="meeting__item__host">
                                    <div class="meeting__item__host__avatar">
                                        <img src="https://s3.amazonaws.com/uifaces/faces/twitter/csswizardry/128.jpg" alt="" class="img-circle inline-block" width="40" height="40">
                                    </div>
                                    <div class="meeting__item__host__caption">Hosted by Stephen Shaw</div>
                                </div>
                            </div>
                            <a href="" class="meeting__item__resource">
                                <span class="meeting__item__resource__text">Download Resources</span>
                                <span class="meeting__item__resource__icon">
                                    <svg class="icon-downloads icon-ss"><use xlink:href="img/icons.svg#icon-downloads"></use></svg>
                                </span>
                            </a>
                        </div>
                        <!-- Meeting Item -->
                        <div class="meeting__item">
                            <div class="meeting__item__content">
                                <div class="meeting__item__content__top">
                                    <a href="" class="meeting__item__title">Using Flutterwave APIs</a>
                                    <p class="meeting__item__location">Howellside</p>
                                    <p class="meeting__item__date">16 Sep 2016</p>
                                </div>

                                <div class="meeting__item__host">
                                    <div class="meeting__item__host__avatar">
                                        <img src="https://s3.amazonaws.com/uifaces/faces/twitter/csswizardry/128.jpg" alt="" class="img-circle inline-block" width="40" height="40">
                                    </div>
                                    <div class="meeting__item__host__caption">Hosted by Stephen Shaw</div>
                                </div>
                            </div>
                            <a href="" class="meeting__item__resource">
                                <span class="meeting__item__resource__text">Download Resources</span>
                                <span class="meeting__item__resource__icon">
                                    <svg class="icon-downloads icon-ss"><use xlink:href="img/icons.svg#icon-downloads"></use></svg>
                                </span>
                            </a>
                        </div>
                        <!-- Meeting Item -->
                        <div class="meeting__item">
                            <div class="meeting__item__content">
                                <div class="meeting__item__content__top">
                                    <a href="" class="meeting__item__title">Using Flutterwave APIs</a>
                                    <p class="meeting__item__location">Howellside</p>
                                    <p class="meeting__item__date">16 Sep 2016</p>
                                </div>

                                <div class="meeting__item__host">
                                    <div class="meeting__item__host__avatar">
                                        <img src="https://s3.amazonaws.com/uifaces/faces/twitter/csswizardry/128.jpg" alt="" class="img-circle inline-block" width="40" height="40">
                                    </div>
                                    <div class="meeting__item__host__caption">Hosted by Stephen Shaw</div>
                                </div>
                            </div>
                            <a href="" class="meeting__item__resource">
                                <span class="meeting__item__resource__text">Download Resources</span>
                                <span class="meeting__item__resource__icon">
                                    <svg class="icon-downloads icon-ss"><use xlink:href="img/icons.svg#icon-downloads"></use></svg>
                                </span>
                            </a>
                        </div>
                        <!-- Meeting Item -->
                        <div class="meeting__item">
                            <div class="meeting__item__content">
                                <div class="meeting__item__content__top">
                                    <a href="" class="meeting__item__title">Using Flutterwave APIs</a>
                                    <p class="meeting__item__location">Howellside</p>
                                    <p class="meeting__item__date">16 Sep 2016</p>
                                </div>

                                <div class="meeting__item__host">
                                    <div class="meeting__item__host__avatar">
                                        <img src="https://s3.amazonaws.com/uifaces/faces/twitter/csswizardry/128.jpg" alt="" class="img-circle inline-block" width="40" height="40">
                                    </div>
                                    <div class="meeting__item__host__caption">Hosted by Stephen Shaw</div>
                                </div>
                            </div>
                            <a href="" class="meeting__item__resource">
                                <span class="meeting__item__resource__text">Download Resources</span>
                                <span class="meeting__item__resource__icon">
                                    <svg class="icon-downloads icon-ss"><use xlink:href="img/icons.svg#icon-downloads"></use></svg>
                                </span>
                            </a>
                        </div>
                        <!-- Meeting Item -->
                        <div class="meeting__item">
                            <div class="meeting__item__content">
                                <div class="meeting__item__content__top">
                                    <a href="" class="meeting__item__title">Using Flutterwave APIs</a>
                                    <p class="meeting__item__location">Howellside</p>
                                    <p class="meeting__item__date">16 Sep 2016</p>
                                </div>

                                <div class="meeting__item__host">
                                    <div class="meeting__item__host__avatar">
                                        <img src="https://s3.amazonaws.com/uifaces/faces/twitter/csswizardry/128.jpg" alt="" class="img-circle inline-block" width="40" height="40">
                                    </div>
                                    <div class="meeting__item__host__caption">Hosted by Stephen Shaw</div>
                                </div>
                            </div>
                            <a href="" class="meeting__item__resource">
                                <span class="meeting__item__resource__text">Download Resources</span>
                                <span class="meeting__item__resource__icon">
                                    <svg class="icon-downloads icon-ss"><use xlink:href="img/icons.svg#icon-downloads"></use></svg>
                                </span>
                            </a>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

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
