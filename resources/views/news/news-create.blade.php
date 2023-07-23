@extends('layouts.user_type.auth') @section('content')
<script src="https://cdn.quilljs.com/1.3.6/quill.js"></script>
<link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet" />

<div>
    <div class="row">
        <div class="col-12">
            <div class="card mb-4 mx-4">
                <div class="card-header pb-0">
                    <div class="d-flex flex-row justify-content-between">
                        <div>
                            <h5 class="mb-0">Create News</h5>
                        </div>
                    </div>
                </div>
                <div class="card-body pb-2">
                    <form id="form" method="POST" action="news-create">
                        @csrf
                        <div class="form-group">
                            <label for="titre_news">Title</label>
                            <input
                                type="text"
                                maxlength="300"
                                class="form-control"
                                id="titre_news"
                                name="titre_news"
                                placeholder="Title of your news"
                                required
                                value="blob"
                            />
                        </div>
                        <div class="form-group">
                            <label for="description_courte"
                                >Short description (visible in the news main
                                page)</label
                            >
                            <div id="description_courte"></div>
                            <input
                                type="hidden"
                                name="description_courte"
                                id="hidden_description_courte"
                            />
                        </div>
                        <div class="form-group">
                            <label for="description_news"
                                >Content (visible in the news detail)</label
                            >
                            <div id="description_news"></div>
                            <input
                                type="hidden"
                                name="description_news"
                                id="hidden_description_news"
                            />
                        </div>
                        <div class="form-group">
                            <label for="date_filter_news">Sorted date</label>
                            <input
                                type="date"
                                class="form-control"
                                id="date_filter_news"
                                name="date_filter_news"
                                required
                                value="2021-05-17"
                            />
                        </div>
                        <div class="form-group">
                            <label for="date_news">Displayed date</label>
                            <p style="font-size: 0.8rem">
                                Like '17 mai 2022', 'avril 2023', '28 mai-27
                                juin 2012'
                            </p>
                            <input
                                type="text"
                                class="form-control"
                                id="date_news"
                                name="date_news"
                                maxlength="20"
                                required
                                value="17 mai 2023"
                            />
                        </div>
                        <div class="form-check form-switch">
                            <input
                                class="form-check-input"
                                type="checkbox"
                                id="lien_news"
                                name="lien_news"
                            />
                            <label class="form-check-label" for="lien_news"
                                >Link</label
                            >
                        </div>
                        <div class="form-check form-switch">
                            <input
                                class="form-check-input"
                                type="checkbox"
                                id="galerie_news"
                                name="galerie_news"
                            />
                            <label class="form-check-label" for="galerie_news"
                                >Photo gallery</label
                            >
                        </div>
                        <div class="form-check form-switch">
                            <input
                                class="form-check-input"
                                type="checkbox"
                                id="images_news"
                                name="images_news"
                            />
                            <label class="form-check-label" for="images_news"
                                >Image</label
                            >
                        </div>
                        <div class="text-center">
                            <button
                                onclick="event.preventDefault(); createNews()"
                                class="btn bg-gradient-dark"
                            >
                                Create news
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<!--

Hey Bismilah! On adorent Jade!

Changement de sujet, ils arrêtent pas de parler, c'est vraiment pénible quand même... Ils parlent forts et elle maintenant depuis qu'elle a eu la discussion avec Flo elle parle encore plus comme un bébé, ça me soule....  


-->

<!-- Initialize Quill editor -->
<script>
    const shortDescriptionQuill = new Quill("#description_courte", {
        theme: "snow",
        placeholder: "Write her...",
        formats: ["bold", "italic", "underline", "link"],
        modules: {
            toolbar: ["bold", "italic", "underline", "link"],
        },
    });
    const bigDescriptionQuill = new Quill("#description_news", {
        theme: "snow",
        placeholder: "Write her...",
        formats: ["bold", "italic", "underline", "link", "list"],
        modules: {
            toolbar: [
                "bold",
                "italic",
                "underline",
                "link",
                { list: "bullet" },
            ],
        },
    });

    const createNews = async () => {
        document.getElementById("hidden_description_courte").value =
            shortDescriptionQuill.root.innerHTML.replaceAll(
                "https://elevagedescharmes.com",
                ""
            );
        document.getElementById("hidden_description_news").value =
            bigDescriptionQuill.root.innerHTML.replaceAll(
                "https://elevagedescharmes.com",
                ""
            );
        document.getElementById("form").submit();
    };
</script>

@endsection
