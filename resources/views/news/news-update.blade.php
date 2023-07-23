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
                    <form id="form" method="POST" action="{{ $news->id_news }}">
                        @method('PUT') @csrf
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
                                value="{{$news->titre_news }}"
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
                                value="{{$news->date_filter_news }}"
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
                                value="{{$news->date_news }}"
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
                                onclick="event.preventDefault(); updateNews()"
                                class="btn bg-gradient-dark"
                            >
                                Update news
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

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
        value: "{{ $news->description_news }}",
    });
    const shortDescription =  @json($news->description_courte ?? NULL);
    const longDescription =  @json($news->description_news ?? NULL);

    shortDescriptionQuill.setContents(
      shortDescriptionQuill.clipboard.convert(shortDescription), 'silent'
    );
    bigDescriptionQuill.setContents(
      bigDescriptionQuill.clipboard.convert(longDescription), 'silent'
    );

    document.getElementById('lien_news').checked = @json($news->lien_news ? true : NULL);
    document.getElementById('images_news').checked = @json($news->images_news ? true : NULL);
    document.getElementById('galerie_news').checked = @json($news->galerie_news ? true : NULL);

    const isQuillEmpty= (quill)=> {
       return quill.getText().trim().length === 0 && quill.container.firstChild.innerHTML.includes("img") === false;
    }

    const updateNews = async () => {
       if (isQuillEmpty(shortDescriptionQuill)) {
          document.getElementById("hidden_description_courte").value = "";
       } else {
          document.getElementById("hidden_description_courte").value =
             shortDescriptionQuill.root.innerHTML.replaceAll(
             "https://elevagedescharmes.com",
             ""
             );
       }

       if (isQuillEmpty(bigDescriptionQuill)) {
          document.getElementById("hidden_description_news").value = "";
       } else {
          document.getElementById("hidden_description_news").value =
             bigDescriptionQuill.root.innerHTML.replaceAll(
                "https://elevagedescharmes.com",
                ""
             );
       }
       document.getElementById("form").submit();
    };
</script>

@endsection
