@extends('layouts.user_type.auth') @section('content')

<div>
    <div class="row">
        <div class="col-12">
            <div class="card mb-4 mx-4">
                <div class="card-header pb-0">
                    <div class="d-flex flex-row justify-content-between">
                        <div>
                            <h5 class="mb-0">All News</h5>
                        </div>
                        <a
                            href="news-create"
                            class="btn bg-gradient-primary btn-sm mb-0"
                            type="button"
                            >+&nbsp; Create news</a
                        >
                    </div>
                </div>
                <div class="card-body px-0 pt-0 pb-2">
                    <div class="table-responsive p-0">
                        <table class="table align-items-center mb-0">
                            <thead>
                                <tr>
                                    <th
                                        class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7"
                                    >
                                        Date
                                    </th>
                                    <th
                                        class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2"
                                    >
                                        Photo / Titre
                                    </th>
                                    <th
                                        class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7"
                                    >
                                        Actions
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($all_news as $news)
                                <?php
                                 $imgLink = "https://elevagedescharmes.com/public/images/news/$news->year_news/$news->id_news.jpg"
                                ?>

                                <tr>
                                    <td class="ps-4">
                                        <p
                                            class="text-xs font-weight-bold mb-0"
                                        >
                                            {{$news->date_news}}
                                        </p>
                                    </td>
                                    <td class="ps-4">
                                        @if ($news->images_news == true)
                                        <div
                                            style="
                                                display: flex;
                                                align-items: center;
                                            "
                                        >
                                            <img
                                                src="{{ $imgLink }}"
                                                class="presentation-mini"
                                                alt="{{$news->titre_news }}"
                                                width="100px"
                                                height="auto"
                                                style="margin-right: 10px"
                                            />
                                            @endif
                                            <p
                                                class="text-xs font-weight-bold mb-0"
                                            >
                                                {!! $news->titre_news !!}
                                            </p>
                                        </div>
                                    </td>
                                    <td class="text-center">
                                        <div style="display: flex">
                                            <a
                                                href="news-update/{{$news->id_news}}"
                                                class="mx-3"
                                                data-bs-toggle="tooltip"
                                                data-bs-original-title="Edit user"
                                            >
                                                <i
                                                    class="fas fa-user-edit text-secondary"
                                                ></i>
                                            </a>
                                            <form
                                                action="news-management/{{
                                                $news->id_news
                                            }}"
                                                method="POST"
                                                id="delete-form"
                                            >
                                                @method('DELETE') @csrf
                                                <span>
                                                    <i
                                                        href=""
                                                        onclick="const a = confirm('Are you sure you want to delete this news ?');
                                                    a ? document.getElementById('delete-form').submit() : null"
                                                        class="cursor-pointer fas fa-trash text-secondary"
                                                    ></i>
                                                </span>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
