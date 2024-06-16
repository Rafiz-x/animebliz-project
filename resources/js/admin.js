import flatpickr from "flatpickr";
import "flatpickr/dist/flatpickr.min.css";

import Barba from "@barba/core";
import gsap from "gsap";

const TMDB_IMG_W_154 = "https://image.tmdb.org/t/p/w154";
const TMDB_IMG_W_185 = "https://image.tmdb.org/t/p/w185";
const TMDB_IMG_W_342 = "https://image.tmdb.org/t/p/w342";
const TMDB_IMG_W_500 = "https://image.tmdb.org/t/p/w500";
const TMDB_IMG_W_780 = "https://image.tmdb.org/t/p/w780";

const TMDB_IMG_W_1280 = "https://image.tmdb.org/t/p/w1280";
const TMDB_IMG_ORIGINAL = "https://image.tmdb.org/t/p/original";

(function ($) {
    $.fn.replaceClass = function (pFromClass, pToClass) {
        return this.removeClass(pFromClass).addClass(pToClass);
    };
})(jQuery);

function select(selector, multiNode = false) {
    if (multiNode) {
        return document.body.querySelectorAll(selector);
    }
    return document.body.querySelector(selector);
}

function gsapAlert(text, bgClass, duration = 3, removeBell = false) {
    let alert = document.createElement("div");

    if (removeBell) {
        alert.innerHTML = `<span class=text>${text}</span>`;
    } else {
        alert.innerHTML = `<svg class=size-6 fill=none stroke=currentColor stroke-width=1.5 viewBox="0 0 24 24"xmlns=http://www.w3.org/2000/svg><path d="M14.857 17.082a23.848 23.848 0 0 0 5.454-1.31A8.967 8.967 0 0 1 18 9.75V9A6 6 0 0 0 6 9v.75a8.967 8.967 0 0 1-2.312 6.022c1.733.64 3.56 1.085 5.455 1.31m5.714 0a24.255 24.255 0 0 1-5.714 0m5.714 0a3 3 0 1 1-5.714 0M3.124 7.5A8.969 8.969 0 0 1 5.292 3m13.416 0a8.969 8.969 0 0 1 2.168 4.5"stroke-linecap=round stroke-linejoin=round /></svg> <span class=text>${text}</span>`;
    }

    alert.classList.add("gsapAlert");
    if (bgClass) {
        alert.classList.add(bgClass);
    }

    document.body.appendChild(alert);

    gsap.to(alert, { top: 66, duration: 0.3 });
    gsap.to(alert, { top: 56, delay: 0.3, duration: 0.15 });

    gsap.to(alert, {
        top: -window.innerHeight,
        delay: 0.75 + duration,
        duration: 0.3,
    });

    setTimeout(() => {
        alert.remove();
    }, 6000);
}

function log(val) {
    console.log(val);
}

function inputClearShow(input, clear) {
    if (input.value.length > 0) {
        clear.classList.remove("hidden");
    } else {
        clear.classList.add("hidden");
    }
}
function clearInput(input, clear) {
    input.value = "";
    clear.classList.add("hidden");
}

async function ajaxGet(url) {
    let data, response;
    response = await fetch(url, {
        headers: {
            "User-Agent":
                "Mozilla/5.0 (Windows NT 6.1; WOW64; rv:47.0) Gecko/20100101 Firefox/47.0",
        },
    });

    response.status === 200 ? (data = await response.json()) : (data = null);

    return {
        status: response.status,
        json: data,
    };
}

// Create Post Page Setting

function createPost() {
    const apiInputBtns = document.body.querySelectorAll(
        ".api .boxes div .field .input input"
    );

    apiInputBtns.forEach((e) => {
        let inputClear = e.nextElementSibling;

        e.addEventListener("input", (ev) => {
            inputClearShow(e, inputClear);
        });
        inputClear.addEventListener("click", (ev) => {
            clearInput(e, inputClear);
        });
    });

    const apiBtns = document.body.querySelectorAll(".api .options span");
    const apiBoxes = document.body.querySelectorAll(".api .boxes > div");

    const apiImportBtns = document.body.querySelectorAll(
        ".api .boxes .actions button.import"
    );

    apiBtns.forEach((btn) => {
        btn.addEventListener("click", (x) => {
            if (x.target.dataset.api == "imdb") {
                gsapAlert(
                    "Scrapping with IMDB link is currently disabled!",
                    "red",
                    1
                );
            }

            if (!btn.classList.contains("active")) {
                apiBoxes.forEach((box) => {
                    if (box.dataset.api != btn.dataset.api) {
                        box.classList.add("hidden");
                    } else {
                        box.classList.remove("hidden");
                    }
                });

                apiBtns.forEach((elem) => {
                    if (elem != btn) {
                        elem.classList.remove("active");
                    } else {
                        elem.classList.add("active");
                    }
                });

                try {
                    // Remove Previous Class
                    $(".form").removeClass("tmdb");
                    $(".form").removeClass("imdb");
                    $(".form").removeClass("jikan");
                    //Add Curent API Class
                    $(".form").addClass(btn.dataset.api);
                } catch (error) { }
            }
        });
    });

    apiImportBtns.forEach((node) => {
        if (node.dataset.api == "tmdb") {
            node.addEventListener("click", (event) => {
                let input = document.querySelector(
                    ".api .boxes .tmdb .input input"
                );
                let url = input.value;

                if (url.length == 0) {
                    gsapAlert("Please paste a link!");
                    return;
                }
                node.setAttribute("disabled", "true");

                let info = getTmdbID(url);

                if (info) {
                    ajaxGet(
                        "//" +
                        location.host +
                        `/api/tmdb/${info.type}/${info.id}`
                    )
                        .then((res) => {
                            if (res.status == 200) {
                                var result = res.json;
                                if (result.status == false) {
                                    gsapAlert(result);
                                } else {
                                    TmdbResponseHandle(result);
                                }
                            } else {
                                gsapAlert(
                                    "Request failed with status: " + res.status,
                                    "red"
                                );
                            }
                            node.removeAttribute("disabled");
                        })
                        .catch((error) => {
                            console.log(error);
                            gsapAlert(error, "red");
                            node.removeAttribute("disabled");
                        });
                } else {
                    node.removeAttribute("disabled");
                    gsapAlert("Paste a valid URL", "red");
                }
            });
        } else if (node.dataset.api == "imdb") {
            node.addEventListener("click", (event) => {
                gsapAlert(
                    "Scrapping with IMDB link is currently disabled!",
                    "red"
                );
                return;

                let input = document.querySelector(
                    ".api .boxes .imdb .input input"
                );
                let url = input.value;

                if (url.length == 0) {
                    gsapAlert("Please paste a link!");
                    return;
                }
                node.setAttribute("disabled", "true");

                let id = getImdbID(url);

                if (id) {
                    //CHecking if url exist
                    ajaxGet(`//${location.host}/api/imdb/check/${id}`)
                        .then((res) => {
                            if (res.status != 200) {
                                gsapAlert(
                                    "Request failed with status: " + res.status,
                                    "red"
                                );
                            } else {
                                // Sending request to scrape data
                                ajaxGet(`//${location.host}/api/imdb/${id}`)
                                    .then((res) => {
                                        if (res.status == 200) {
                                            var result = res.json;
                                            if (result.success) {
                                                ImdbResponseHandle(result, id);
                                            } else {
                                                gsapAlert(result);
                                            }
                                        } else {
                                            gsapAlert(
                                                "Request failed with status: " +
                                                res.status,
                                                "red"
                                            );
                                        }
                                        node.removeAttribute("disabled");
                                    })
                                    .catch((error) => {
                                        gsapAlert(error, "red");
                                        node.removeAttribute("disabled");
                                    });
                            }
                        })
                        .catch((error) => {
                            gsapAlert(error, "red");
                            node.removeAttribute("disabled");
                        });
                } else {
                    node.removeAttribute("disabled");
                    gsapAlert("Paste a valid URL", "red");
                }
            });
        } else if (node.dataset.api == "jikan") {
            node.addEventListener("click", (event) => {
                let input = document.querySelector(
                    ".api .boxes .jikan .input input"
                );
                let url = input.value;

                if (url.length == 0) {
                    gsapAlert("Please paste a link!");
                    return;
                }
                node.setAttribute("disabled", "true");

                let id = getMalId(url);

                if (id) {
                    ajaxGet("https://api.jikan.moe/v4/anime/" + id)
                        .then((res) => {
                            var result = res.json;
                            if (result.data) {
                                if (result.status == false) {
                                    gsapAlert(result);
                                } else {
                                    JikanResponseHandle(result);
                                }
                            } else {
                                gsapAlert(
                                    "Request failed with status: " + res.status,
                                    "red"
                                );
                            }
                            node.removeAttribute("disabled");
                        })
                        .catch((error) => {
                            console.log(error);
                            gsapAlert(error, "red");
                            node.removeAttribute("disabled");
                        });
                } else {
                    node.removeAttribute("disabled");
                    gsapAlert("Paste a valid URL", "red");
                }
            });
        }
    });

    $(".api .boxes .field input").on("keypress", function (e) {
        if (e.which === 13 || e.keyCode === 13) {
            // Check if Enter key is pressed
            $(this).closest(".field").find(".actions button").click();
        }
    });

    let modalCheckBoxes = $(".modal .part input[type=checkbox]");

    modalCheckBoxes.each((index) => {
        let checkbox = modalCheckBoxes[index];
        $(checkbox).on("change", (e) => {
            let input =
                checkbox.parentElement.parentElement.querySelector("[name]");
            if (e.target.checked) {
                input.removeAttribute("disabled");
            } else {
                input.setAttribute("disabled", "");
            }
        });
    });

    $(".modal .actions .close").click((e) => {
        if ($(".modal").attr("open") !== undefined) {
            $(".modal").removeAttr("open");
            $(".dialog_opener").replaceClass("block", "hidden");
        }
    });

    $(".modal .actions .minimize").click((e) => {
        if ($(".modal").attr("open") !== undefined) {
            $(".modal").removeAttr("open");
            $(".modal").attr("minimized", true);
            $(".dialog_opener").replaceClass("hidden", "block");
        }
    });

    $(".dialog_opener").click((e) => {
        if ($(".modal").attr("open") === undefined) {
            $(".modal").attr("open", true);
            $(".dialog_opener").replaceClass("block", "hidden");
        }
    });

    const fields = [
        "imdb_id",
        "tmdb_id",
        "mal_id",
        "poster_type",
        "default_poster_url",
        "large_poster_url",
        "small_poster_url",
        "poster_custom",
        "backdrop_type",
        "large_backdrop_url",
        "small_backdrop_url",
        "backdrop_custom",
        "title",
        "type",
        "isAnime",
        "synopsis",
        "ratingType",
        "rating",
        "releaseDate",
        "location",
        "genre",
        "category",
    ];

    $(".modal .form .select2").each(function () {
        $(this).select2();
    });

    $("#mainForm .select2").each(function () {
        $(this).select2();
    });

    $(".genre.select2").select2({
        placeholder: "Select Genre(s)",
    });

    $(".category.select2").select2({
        placeholder: "Select Category(s)",
        height: "100px",
    });

    let releaseDate = flatpickr("[name=releaseDate]", {
        enableTime: false,
        dateFormat: "Y-m-d",
    });

    //? Modal Checkbox setting

    let select_all_checkboxes = $(".modal #select_all_checkboxes");
    let modalCheckBoxPoster = $(".modal #checkbox_poster");
    let modalCheckBoxBackdrop = $(".modal #checkbox_backdrop");

    modalCheckBoxPoster.click((e) => {
        if ($(this).is(":checked")) {
            $(".modal poster_upload_url")
                .find("input[type=checkbox]")
                .prop("checked", true);
        } else {
            $(".modal poster_upload_url")
                .find("input[type=checkbox]")
                .prop("checked", false);
        }
    });

    modalCheckBoxBackdrop.click((e) => {
        if ($(this).is(":checked")) {
            $(".modal backdrop_upload_url")
                .find("input[type=checkbox]")
                .prop("checked", true);
        } else {
            $(".modal backdrop_upload_url")
                .find("input[type=checkbox]")
                .prop("checked", false);
        }
    });

    $("#modalChangeBtn").click((e) => {
        fields.forEach(function (field) {
            var modalFormField =
                select('.modal form [name="' + field + '"]') ||
                select('.modal form [name="' + field + '\\[\\]"]');
            var mainFormField =
                select('#mainForm [name="' + field + '"]') ||
                select('#mainForm [name="' + field + '\\[\\]"]');

            modalFormField = $(modalFormField);
            mainFormField = $(mainFormField);

            // if (modalFormInput.length && mainFormField.length) {
            if (
                modalFormField
                    .parent()
                    .find("input[type=checkbox]")
                    .is(":checked")
            ) {
                // Checking The Checkbox if checked

                if (modalFormField[0].tagName.toLowerCase() === "select") {
                    mainFormField.val(modalFormField.val()).change();
                } else {
                    mainFormField.val(modalFormField.val()).trigger("input");
                }
            }
            // }
        });

        // After copy finished
        $(".modal .actions .close").click(); // To hide the modal Form
    });

    select_all_checkboxes.on("change", (e) => {
        if (select_all_checkboxes.is(":checked")) {
            modalCheckBoxes.prop("checked", true);
            // select_all_checkboxes.siblings('span').html('Select All');
        } else {
            modalCheckBoxes.prop("checked", false);
            // select_all_checkboxes.siblings('span').html('Unselect All');
        }
        modalCheckBoxes.change();
    });

    let mainForm = $(select("#mainForm"));

    mainForm.on("submit", function (event) {
        wholePageLoader("on"); // Turning on the page loader;

        event.preventDefault(); // Prevent the form from submitting the default way
        let formData = new FormData(this);
        $.ajax({
            url: mainForm.attr("action"),
            type: "POST",
            data: formData,
            processData: false,
            contentType: false,
            success: function (res) {
                wholePageLoader("off"); // Turning off the page loader

                if (res.success) {
                    gsapAlert(res.msg, "green");
                }

                finishCreatedPost(res);
            },
            error: function (xhr, status, error) {
                wholePageLoader("off"); // Turning off the page loader;

                if (xhr.status == 422) {
                    let errors = xhr.responseJSON;

                    let style =
                        Object.keys(errors).length > 1 ||
                            errors[Object.keys(errors)[0]].length > 1
                            ? "all: revert;"
                            : ""; // Checking If the object has one key and that has one value

                    let txt = `<ol style="${style}" class="flex flex-col gap-2 pr-2">`;

                    for (const key in errors) {
                        if (errors.hasOwnProperty(key)) {
                            errors[key].forEach((error) => {
                                txt += `<li class='pl-1'>${error}</li>`;
                            });
                        }
                    }

                    txt += "</ol>";
                    gsapAlert(txt, "red", 4, true);
                } else {
                    gsapAlert(
                        "Failed with error code: " + xhr.status + ` (${error})`,
                        "red"
                    );
                }
            },
        });
    });

    // Map form fields to class properties
    formSetting("#mainForm");
    formSetting(".modal");

    $(document).on('keyup', e => {
        let event = e.originalEvent;
        log(event);
        if (event.keyCode === 13 && event.ctrlKey) {
            mainForm.submit();
        }
    });
}

function finishCreatedPost(res) {

    $("#mainForm").trigger("reset"); //* Reseting Modal Form Previous Values
    $("#mainForm select").change(); //* Triggering Change to reset Select2 Value(s)
    $("#mainForm input").trigger('input'); //* Triggering Input
    gsapAlert('Post Created Successfully', 'green');

    return;
    const post = res.post;
    let title = post.title;
    let slug = post.slug;
    let published = post.published;
    let backdrops = post.backdrops;
    let release_date = post.release_date;
    let created_at = post.created_at;

    let backdropType = backdrops.type;
    let backdropImg = backdrops.img;
    let imgPrefix = "";

    let smallBackdrop, publishStatus;

    if (backdropImg.small) {
        smallBackdrop = `<source media="(max-width: 1280px)" srcset="${imgPrefix + backdropImg.small
            }">`;
    }
    if (published == "1") {
        publishStatus = "Published";
    } else {
        publishStatus = "Not Published";
    }

    if (backdropType == "custom") {
        imgPrefix = "/uploads/backdrops/";
    }

    let domainURL = "http://127.0.0.1:8000";
    let create_post_url = "/admin/post/create";
    let edit_post_url = "/admin/post/edit";

    let elem = `<div class="w-fit mx-auto create_post_status">

                    <h1 class="text-white lg:text-lg">Post Created Successfully</h1>

                    <div class="flex flex-col gap-4 justify-center items-center">
                        <div class="backdrop mx-auto w-[95%] sm:w-[420px] md:w-[460px] lg:w-[520px] p-1 rounded-md">
                            <picture>
                                ${smallBackdrop}
                                <img class="w-full aspect-[16/9] rounded-md"
                                    src="${imgPrefix + backdropImg.large}"
                                    alt="${title}">
                            </picture>
                        </div>
                        <div
                            class="info text-white font-semibold w-fit mx-auto sm:text-sm md:text-base lg:text-lg xl:text-xl">
                            <span class="title">${title}</span>
                            <span class="year">(${release_date.year})</span>
                        </div>
                    </div>

                    <div class="flex flex-col gap-5 mt-5 min-w-fit mx-auto">
                        <div class="flex gap-3 w-full justify-center items-center text-white">
                            <div class="eye shrink-0 size-10 aspect-square rounded-md bg-slate-800 flex justify-center items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" class="size-6">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M2.036 12.322a1.012 1.012 0 0 1 0-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178Z" />
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                                </svg>
                            </div>

                            <div class="w-full url text-center text-sm md:text-base bg-slate-800 p-2 rounded-md ">
                                <span class="slug text-blue-500 text-wrap">
                                    <span class="text-white">animebliz.gg/</span>${slug}</span>
                            </div>


                            <div class="copy shrink-0 size-6 cursor-pointer relative text-pink-500 hoverBgBefore"
                                id="slug_copy_btn">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="#fff" class="size-full">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M15.75 17.25v3.375c0 .621-.504 1.125-1.125 1.125h-9.75a1.125 1.125 0 0 1-1.125-1.125V7.875c0-.621.504-1.125 1.125-1.125H6.75a9.06 9.06 0 0 1 1.5.124m7.5 10.376h3.375c.621 0 1.125-.504 1.125-1.125V11.25c0-4.46-3.243-8.161-7.5-8.876a9.06 9.06 0 0 0-1.5-.124H9.375c-.621 0-1.125.504-1.125 1.125v3.5m7.5 10.375H9.375a1.125 1.125 0 0 1-1.125-1.125v-9.25m12 6.625v-1.875a3.375 3.375 0 0 0-3.375-3.375h-1.5a1.125 1.125 0 0 1-1.125-1.125v-1.5a3.375 3.375 0 0 0-3.375-3.375H9.75" />
                                </svg>

                            </div>

                        </div>

                        <div class="flex w-full justify-between items-center text-white gap-4">
                            <div class="flex items-center gap-3">
                                <span>Status: </span>
                                <span class="status font-semibold text-amber-500">${publishStatus}</span>
                            </div>
                            <a href="${domainURL + edit_post_url + "/" + slug}"
                                class="flex items-center gap-1 text-blue-400 beforeUnderline rounded-md text-sm cursor-pointer ml-10">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" class="size-5 shrink-0">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10" />
                                </svg>
                                <span>Change</span>
                            </a>
                        </div>

                        <div class="flex w-full justify-between items-center text-white gap-4">
                            <a href="${domainURL + "/" + slug}" target="_blank"
                                class="px-4 py-2 bg-blue-600 rounded-md transition-colors hover:bg-blue-500">View Post
                            </a>
                            <a href="${domainURL + create_post_url}"
                                class="px-4 py-2 bg-purple-600 rounded-md transition-colors hover:bg-purple-500">Go Back
                            </a>
                        </div>
                    </div>



                </div>`;

    $(".work_area").html(elem);

    // Intialize the eventListener
    $("#slug_copy_btn").click((e) => {
        let spans = $(".create_post_status .url span");
        let copyUrl = "";

        spans.each((index) => {
            let span = $(spans[index]);
            copyUrl += span.text();
        });

        let clipboardStatus = navigator.clipboard.writeText(copyUrl);
        if (clipboardStatus) {
            gsapAlert("Copied Successfully", "green");
        } else {
            gsapAlert("Can' Copy URL", "red");
        }
    });
}

function formSetting(nodeSelector) {
    // SLUG URL Setting
    $("#mainForm #title").on("input", function () {
        if ($('#mainForm input[name="slug_type"]:checked').val() === "auto") {
            var title = $(this)
                .val()
                .toLowerCase()
                .replace(/\s+/g, "-")
                .replace(/[^a-z0-9-]/g, "");
            $("#mainForm #slug").val(title);
        }
    });

    $("#mainForm #slug").on("input", function () {
        if ($('#mainForm input[name="slug_type"]:checked').val() === "auto") {
            $(this).val("");
            return;
        }
        var sanitizedSlug = $(this)
            .val()
            .toLowerCase()
            .replace(/\s+/g, "-")
            .replace(/[^a-z0-9-]/g, "");
        $(this).val(sanitizedSlug);
    });

    $('#mainForm input[name="slug_type"]').on("change", function () {
        $("#mainForm #title").trigger("input");
    });

    // Event handler for rating input
    $(nodeSelector)
        .find('[id="rating"]')
        .on("input", function (e) {
            let nodeVal = e.target.value;
            let arr = nodeVal.split(".");

            // Check if the value is 10, if so, do not allow the dot
            if (parseFloat(nodeVal) === 10) {
                e.target.value = "10";
                return;
            }
            // Check if the value is greater than 10, if so, truncate it to 10
            if (parseFloat(nodeVal) > 10) {
                e.target.value = "10";
                return;
            }
            // If there's a dot, ensure there are at most 2 digits after the dot
            if (arr[1] && arr[1].length >= 2) {
                e.target.value = arr[0] + "." + arr[1].substr(0, 2);
            }
        });

    // Handling Poster and Backdrop URL(s)
    $(nodeSelector)
        .find('[id="default_poster_url"]')
        .on("input", (e) => {
            let poster = $(nodeSelector).find('[id="default_poster"]');
            if (e.target.value.length > 0) {
                poster.attr("src", e.target.value);
                poster.removeClass("hidden");
            } else {
                poster.addClass("hidden");
            }
        });

    $(nodeSelector)
        .find('[id="large_poster_url"]')
        .on("input", (e) => {
            let poster = $(nodeSelector).find('[id="large_poster"]');
            if (e.target.value.length > 0) {
                poster.attr("src", e.target.value);
                poster.removeClass("hidden");
            } else {
                poster.addClass("hidden");
            }
        });

    $(nodeSelector)
        .find('[id="small_poster_url"]')
        .on("input", (e) => {
            let poster = $(nodeSelector).find('[id="small_poster"]');
            if (e.target.value.length > 0) {
                poster.attr("src", e.target.value);
                poster.removeClass("hidden");
            } else {
                poster.addClass("hidden");
            }
        });

    // Handling Backdrop URLs
    $(nodeSelector)
        .find('[id="large_backdrop_url"]')
        .on("input", function (e) {
            let backdrop = $(nodeSelector).find('[id="large_backdrop"]');
            if (e.target.value.length > 0) {
                backdrop.attr("src", e.target.value).removeClass("hidden");
            } else {
                backdrop.attr("src", "").addClass("hidden");
            }
        });

    $(nodeSelector)
        .find('[id="small_backdrop_url"]')
        .on("input", function (e) {
            let backdrop = $(nodeSelector).find('[id="small_backdrop"]');
            if (e.target.value.length > 0) {
                backdrop.attr("src", e.target.value).removeClass("hidden");
            } else {
                backdrop.attr("src", "").addClass("hidden");
            }
        });

    // Handling Poster and Backdrop Custom Upload(s)
    $(nodeSelector)
        .find("#poster_upload_btn")
        .click((e) => {
            $(nodeSelector).find("#poster_custom").click();
        });

    $(nodeSelector)
        .find("#poster_custom")
        .on("change", function (event) {
            var input = event.target;

            if (input.files && input.files[0]) {
                var file = input.files[0];
                var fileType = file.type;

                if (fileType.startsWith("image/")) {
                    var reader = new FileReader();

                    reader.onload = function (e) {
                        $(nodeSelector)
                            .find("#custom_poster_img")
                            .attr("src", e.target.result)
                            .removeClass("hidden");
                        $(nodeSelector)
                            .find("#poster_upload_btn")
                            .html("Change");
                    };

                    reader.readAsDataURL(file);
                } else {
                    gsapAlert("Please select a valid image file.", "red");
                    $(nodeSelector)
                        .find("#custom_poster_img")
                        .attr("src", "")
                        .addClass("hidden");
                    $(nodeSelector).find("#poster_upload_btn").html("Upload");
                }
            } else {
                $(nodeSelector)
                    .find("#custom_poster_img")
                    .attr("src", "")
                    .addClass("hidden");
                $(nodeSelector).find("#poster_upload_btn").html("Upload");
            }
        });

    $(nodeSelector)
        .find("#backdrop_upload_btn")
        .click((e) => {
            $(nodeSelector).find("#backdrop_custom").click();
        });

    $(nodeSelector)
        .find("#backdrop_custom")
        .on("change", function (event) {
            var input = event.target;

            if (input.files && input.files[0]) {
                var file = input.files[0];
                var fileType = file.type;

                if (fileType.startsWith("image/")) {
                    var reader = new FileReader();

                    reader.onload = function (e) {
                        $(nodeSelector)
                            .find("#custom_backdrop_img")
                            .attr("src", e.target.result)
                            .removeClass("hidden");
                        $(nodeSelector)
                            .find("#backdrop_upload_btn")
                            .html("Change");
                    };

                    reader.readAsDataURL(file);
                } else {
                    gsapAlert("Please select a valid image file.", "red");
                    $(nodeSelector)
                        .find("#custom_backdrop_img")
                        .attr("src", "")
                        .addClass("hidden");
                    $(nodeSelector).find("#backdrop_upload_btn").html("Upload");
                }
            } else {
                $(nodeSelector)
                    .find("#custom_backdrop_img")
                    .attr("src", "")
                    .addClass("hidden");
                $(nodeSelector).find("#backdrop_upload_btn").html("Upload");
            }
        });

    // Switching URL -> Custom || Custom -> URL
    $(nodeSelector)
        .find("#poster_type")
        .on("change", function () {
            var selectedValue = $(this).val();

            if (selectedValue === "url") {
                $(nodeSelector)
                    .find("#poster_upload_url")
                    .replaceClass("hidden", "flex");
                $(nodeSelector)
                    .find("#poster_upload_custom")
                    .replaceClass("flex", "hidden");
            } else if (selectedValue === "custom") {
                $(nodeSelector)
                    .find("#poster_upload_url")
                    .replaceClass("flex", "hidden");
                $(nodeSelector)
                    .find("#poster_upload_custom")
                    .replaceClass("hidden", "flex");
            }
        });

    $(nodeSelector)
        .find("#backdrop_type")
        .on("change", function () {
            var selectedValue = $(this).val();

            if (selectedValue === "url") {
                $(nodeSelector)
                    .find("#backdrop_upload_url")
                    .replaceClass("hidden", "flex");
                $(nodeSelector)
                    .find("#backdrop_upload_custom")
                    .replaceClass("flex", "hidden");
            } else if (selectedValue === "custom") {
                $(nodeSelector)
                    .find("#backdrop_upload_url")
                    .replaceClass("flex", "hidden");

                $(nodeSelector)
                    .find("#backdrop_upload_custom")
                    .replaceClass("hidden", "flex");
            }
        });
}

class PostForm {
    constructor(selector) {
        const form = document.body.querySelector(selector);
        this.form = form;

        // Map form fields to class properties
        const fields = [
            "imdb_id",
            "tmdb_id",
            "mal_id",
            "poster_type",
            "default_poster_url",
            "large_poster_url",
            "small_poster_url",
            "poster_custom",
            "backdrop_type",
            "large_backdrop_url",
            "small_backdrop_url",
            "backdrop_custom",
            "title",
            "type",
            "isAnime",
            "synopsis",
            "ratingType",
            "rating",
            "releaseDate",
            "location",
            "genre",
        ];
        //  'category' removed

        fields.forEach((field) => {
            this[field] =
                form.querySelector(`[name=${field}]`) ||
                form.querySelector(`[name=${field}\\[\\]]`);
        });
    }
}

function sortResponse(res, api) {
    if (api === "tmdb") {
        let type,
            title,
            imdb_id,
            releaseDate,
            genres = [];

        // Determine type (movie or tv)
        type = res.number_of_episodes || res.number_of_seasons ? "tv" : "movie";

        // Determine title
        title =
            res.name ||
            res.title ||
            res.original_title ||
            res.original_name ||
            "No Title Found";

        // Determine release date
        releaseDate = res.release_date || res.first_air_date;

        // Determine IMDB ID
        imdb_id = res.imdb_id || null;

        // Collect genres
        res.genres.forEach((e) => {
            genres.push(e.name);
        });

        return {
            tmdb_id: res.id,
            imdb_id: imdb_id,
            poster_type: "url",
            default_poster_url: TMDB_IMG_W_342 + res.poster_path,
            large_poster_url: TMDB_IMG_W_500 + res.poster_path,
            small_poster_url: TMDB_IMG_W_185 + res.poster_path,
            backdrop_type: "url",
            large_backdrop_url: TMDB_IMG_ORIGINAL + res.backdrop_path,
            small_backdrop_url: TMDB_IMG_W_1280 + res.backdrop_path,
            title: title,
            type: type,
            synopsis: res.overview,
            ratingType: "tmdb",
            rating: res.vote_average,
            releaseDate: releaseDate,
            location: res.origin_country[0],
            genre: genres,
        };
    } else if (api === "jikan") {
        res = res.data || res;
        let genres = [],
            fromDate,
            formattedDate = null;

        if (res.aired && res.aired.prop && res.aired.prop.from) {
            fromDate = res.aired.prop.from;
            formattedDate = `${fromDate.year}-${String(fromDate.day).padStart(
                2,
                "0"
            )}-${String(fromDate.month).padStart(2, "0")}`;
        }

        if (res.genres) {
            genres = res.genres.map((e) => e.name);
        }

        return {
            mal_id: res.mal_id,

            title: res.title,
            type: res.type.toLowerCase(),
            poster_type: "url",
            default_poster_url: res.images.webp.image_url,
            large_poster_url: res.images.webp.large_image_url,
            backdrop_type: "url",
            // large_backdrop_url:,
            // small_backdrop_url:,
            synopsis: res.synopsis,
            ratingType: "mal",
            rating: res.score,
            releaseDate: formattedDate,
            location: "Japan",
            genre: genres,
        };
    }

    // else if(api === 'imdb'){
    //     let type;
    //     res.type == 'TV Series' ? type='tv' : res.type == 'Movie' ? type='movie';

    //     return {
    //         title: res.title,
    //     }
    // }
}

// Validate and return info from urls
function getMalId(url) {
    if (!isNaN(url)) {
        return url;
    }

    if (!/^(?:f|ht)tps?:\/\//i.test(url)) {
        url = "https://" + url;
    }

    try {
        const parsedUrl = new URL(url);

        if (parsedUrl.hostname.includes("myanimelist.net")) {
            const path = parsedUrl.pathname;
            const segments = path
                .split("/")
                .filter((segment) => segment.length > 0);

            // Check if the URL format is correct
            if (segments.length >= 2 && segments[0] === "anime") {
                // Extract the ID
                const id = parseInt(segments[1], 10);

                // Check if the ID is a valid integer
                if (!isNaN(id)) {
                    return id;
                }
            }
        }
    } catch (error) {
        return null;
    }

    return null;
}

function getTmdbID(url) {
    if (!/^(?:f|ht)tps?:\/\//i.test(url)) {
        url = "https://" + url;
    }
    try {
        const parsedUrl = new URL(url);

        if (
            parsedUrl.hostname === "www.themoviedb.org" ||
            parsedUrl.hostname === "themoviedb.org"
        ) {
            const path = parsedUrl.pathname;
            const segments = path
                .split("/")
                .filter((segment) => segment.length > 0);

            if (segments.length >= 2) {
                const type = segments[0];
                const id = parseInt(segments[1], 10);

                if (["movie", "tv"].includes(type)) {
                    return {
                        type: type,
                        id: id,
                    };
                }
            }
        }
    } catch (error) {
        return null;
    }

    return null;
}

function getImdbID(url) {
    if (!/^(?:f|ht)tps?:\/\//i.test(url)) {
        url = "https://" + url;
    }

    try {
        const parsedUrl = new URL(url);

        // Ensure the hostname is exactly imdb.com or www.imdb.com
        if (
            parsedUrl.hostname === "www.imdb.com" ||
            parsedUrl.hostname === "imdb.com"
        ) {
            const path = parsedUrl.pathname;
            const segments = path
                .split("/")
                .filter((segment) => segment.length > 0);

            if (segments.length >= 2 && segments[0] === "title") {
                const id = segments[1];

                // Validate the ID format (e.g., tt1234567)
                if (/^tt\d+$/.test(id)) {
                    return id;
                }
            }
        }
    } catch (error) {
        return null;
    }

    return null;
}

async function getGenreIds(genres) {
    let genreString = genres.join(",");

    genreString = encodeURIComponent(genreString); // For URL Encoding

    try {
        let res = await ajaxGet(
            "//" + location.host + `/admin/genre/check?genres=${genreString}`
        );

        if (res.status == 200) {
            let json = res.json;
            if (json.success) {
                let foundGenres = json.genres;

                foundGenres.forEach((e) => {
                    // Genres that are found being removed from the genres array
                    genres = genres.filter((item) => item !== e.name);
                });

                return {
                    found: foundGenres,
                    not_found: genres,
                };
            } else {
                gsapAlert(json.msg);
                return null; // or some other appropriate value indicating failure
            }
        } else {
            gsapAlert(
                "Fetching Genre(s) failed with status : " + res.status,
                "red"
            );
            return null; // or some other appropriate value indicating failure
        }
    } catch (err) {
        console.log(err);
        return null; // or some other appropriate value indicating failure
    }
}

async function TmdbResponseHandle(res) {
    let output = sortResponse(res, "tmdb");
    let Form = new PostForm(".modal .form form");

    $("input#tmdb_id").val(output.tmdb_id);
    $("input#imdb_id").val(output.imdb_id);
    $("input#mal_id").val(output.mal_id);

    openModal(); // Openning Dialog Modal

    // Set form values automatically
    for (let key in output) {
        if (output.hasOwnProperty(key) && Form[key]) {
            if (Array.isArray(output[key])) {
                // Handle multi-select fields (like genre)
                if (key === "genre") {
                    try {
                        let genres = await getGenreIds(output.genre);
                        if (genres) {
                            let genreIDs = genres.found.map((e) => e.id);

                            $(Form[key]).val(genreIDs).change();

                            if (genres.not_found.length > 0) {
                                let notFoundGenreNames =
                                    genres.not_found.join(", ");

                                $(".genre_not_found .not-found").html(
                                    notFoundGenreNames
                                );
                                $(".genre_not_found").replaceClass(
                                    "hidden",
                                    "flex"
                                );
                            }
                        }
                    } catch (err) {
                        console.log(err);
                    }
                } else {
                    $(Form[key]).val(output[key]).change();
                }
            } else {
                // Handle other fields
                Form[key].value = output[key];
                $(Form[key]).change();
                $(Form[key]).trigger("input");
            }
        }
    }
}

async function JikanResponseHandle(res) {
    let output = sortResponse(res, "jikan");
    let Form = new PostForm(".modal .form form");

    $("input#mal_id").val(output.mal_id);

    openModal();

    // Set form values automatically
    for (let key in output) {
        if (output.hasOwnProperty(key) && Form[key]) {
            if (Array.isArray(output[key])) {
                // Handle multi-select fields (like genre)
                if (key === "isAnime") {
                    $(Form[key]).val("1").change();
                } else if (key === "genre") {
                    try {
                        let genres = await getGenreIds(output.genre);

                        if (genres) {
                            let genreIDs = genres.found.map((e) => e.id);

                            $(Form[key]).val(genreIDs).change();

                            if (genres.not_found.length > 0) {
                                let notFoundGenreNames =
                                    genres.not_found.join(", ");

                                $(".genre_not_found .not-found").html(
                                    notFoundGenreNames
                                );
                                $(".genre_not_found").replaceClass(
                                    "hidden",
                                    "flex"
                                );
                            }
                        }
                    } catch (err) {
                        console.log(err);
                    }
                } else {
                    $(Form[key]).val(output[key]).change();
                }
            } else {
                // Handle other fields
                Form[key].value = output[key];
                $(Form[key]).change();
                $(Form[key]).trigger("input");
            }
        }
    }
}

async function ImdbResponseHandle(res, imdb_id) {
    let output = sortResponse(res, "imdb");
    let Form = new PostForm(".modal .form form");
    console.log(res);
    return;

    $("input#imdb_id").val(imdb_id);

    openModal();
    // Set form values automatically
    for (let key in output) {
        if (output.hasOwnProperty(key) && Form[key]) {
            if (Array.isArray(output[key])) {
                // Handle multi-select fields (like genre)
                if (key === "genre") {
                    try {
                        let genres = await getGenreIds(output.genre);
                        if (genres) {
                            let genreIDs = genres.found.map((e) => e.id);

                            $(Form[key]).val(genreIDs).change();

                            if (genres.not_found.length > 0) {
                                let notFoundGenreNames =
                                    genres.not_found.join(", ");

                                $(".genre_not_found .not-found").html(
                                    notFoundGenreNames
                                );
                                $(".genre_not_found").replaceClass(
                                    "hidden",
                                    "flex"
                                );
                            }
                        }
                    } catch (err) {
                        console.log(err);
                    }
                } else {
                    $(Form[key]).val(output[key]).change();
                }
            } else {
                // Handle other fields
                Form[key].value = output[key];
                $(Form[key]).change();
                $(Form[key]).trigger("input");
            }
        }
    }
}

function openModal() {
    $(".modal").removeAttr("minimized");
    $(".dialog_opener").replaceClass("block", "hidden");
    $(".modal").attr("open", true);

    $(".modal .form form").trigger("reset"); //* Reseting Modal Form Previous Values
    $(".modal .form form select").change(); //* Triggering Change to reset Select2 Value(s)

    $(".modal #select_all_checkboxes").prop("checked", true).change(); //* Triggering Select All
}

function wholePageLoader(action = "on") {
    let loader = $(select(".loading-overlay"));
    if (action == "on") {
        if (loader.hasClass("hidden")) {
            loader.removeClass("hidden");
        } else console.log("Loaded is already On!");
    } else if (action == "off") {
        if (!loader.hasClass("hidden")) {
            loader.addClass("hidden");
        } else console.log("Loaded is already Off!");
    }
}

document.addEventListener("DOMContentLoaded", (e) => {
    const profile = document.querySelector("nav .profile");
    const profileMenu = document.querySelector("nav .profile .menu");
    profile.addEventListener("click", (e) => {
        if (e.target != profileMenu && profileMenu.contains(e.target)) return;
        if (profile.classList.contains("active")) {
            gsap.to("nav .profile svg", { rotate: 0, duration: 0.15 });
            gsap.to("nav .profile .menu", { height: 0, duration: 0.15 });

            profile.classList.remove("active");
        } else {
            gsap.to("nav .profile .chevron", { rotate: 180, duration: 0.15 });
            gsap.to("nav .profile .menu", { height: "auto", duration: 0.15 });
            profile.classList.add("active");
        }
    });
    const sidebarDropdowns = document.body.querySelectorAll(
        ".sidebar .wrapper .list .dropdown"
    );
    sidebarDropdowns.forEach((e) => {
        let chevron = e.querySelector(".chevron");
        let dropdownItems = e.querySelector(".dropdownItems");
        e.addEventListener("click", (x) => {
            if (e.classList.contains("activated")) {
                e.classList.remove("activated");
                gsap.to(dropdownItems, { height: 0, duration: 0.1 });
                gsap.to(chevron, { rotate: 0, duration: 0 });
            } else {
                e.classList.add("activated");
                gsap.to(dropdownItems, { height: "auto", duration: 0.1 });
                gsap.to(chevron, { rotate: 180, duration: 0 });
            }
        });
    });
    const menu = document.body.querySelector("nav > .menu");
    const sidebar = document.body.querySelector("main .sidebar");
    const menuHamburger = menu.querySelector(".hamburger");
    const menuClose = menu.querySelector(".close");

    menu.addEventListener("click", (e) => {
        if (menu.classList.contains("activated")) {
            menu.classList.remove("activated");
            gsap.to(sidebar, { left: -300, duration: 0.25 });

            gsap.to(menuHamburger, { width: 32, duration: 0.25 });
            gsap.to(menuClose, { width: 0, duration: 0.25 });
        } else {
            menu.classList.add("activated");
            gsap.to(sidebar, {
                left: 0,
                padding: "20px",
                width: "auto",
                duration: 0.25,
            });

            gsap.to(menuHamburger, { width: 0, duration: 0.25 });
            gsap.to(menuClose, { width: 32, duration: 0.25 });
        }
    });

    const sidebarArrow = select(".sidebarArrow");
    const sidebarArrowLeft = select(".sidebarArrow .left");
    const sidebarArrowRight = select(".sidebarArrow .right");

    sidebarArrow.addEventListener("click", (e) => {
        if (sidebarArrow.classList.contains("activated")) {
            sidebarArrow.classList.remove("activated");
            gsap.to(sidebarArrowLeft, { width: 24, duration: 0.3 });
            gsap.to(sidebarArrowRight, { width: 0, duration: 0.3 });

            // sidebar.classList.remove('activated');
            gsap.to(sidebar, {
                width: "auto",
                padding: "40px 24px",
                duration: 0.2,
            });
        } else {
            sidebarArrow.classList.add("activated");
            gsap.to(sidebarArrowLeft, { width: 0, duration: 0.3 });
            gsap.to(sidebarArrowRight, { width: 24, duration: 0.3 });

            gsap.to(sidebar, { width: 0, padding: 0, duration: 0.2 });
            // sidebar.classList.add('activated');
        }
    });

    document.addEventListener("click", (e) => {
        let node = e.target;
        if (
            profile != node &&
            profileMenu != node &&
            !profile.contains(node) &&
            !profileMenu.contains(node)
        ) {
            gsap.to("nav .profile svg", { rotate: 0, duration: 0.15 });
            gsap.to("nav .profile .menu", { height: 0, duration: 0.15 });
            profile.classList.remove("active");
        }

        if (
            menu != node &&
            sidebar != node &&
            !menu.contains(node) &&
            !sidebar.contains(node)
        ) {
            if (menu.classList.contains("activated")) {
                menu.classList.remove("activated");
                gsap.to(sidebar, { left: -300, duration: 0.25 });

                gsap.to(menuHamburger, { width: 32, duration: 0.25 });
                gsap.to(menuClose, { width: 0, duration: 0.25 });
            }
        }
    });

    // sidebarArrow.click();

    let workAreaParent = document.querySelector(".work_area_parent");
    let workAreaScoll = localStorage.getItem("work_area_scroll");

    if (workAreaScoll) {
        workAreaParent.scrollTop = Number(workAreaScoll);
    }

    workAreaParent.onscroll = (e) => {
        localStorage.setItem("work_area_scroll", e.target.scrollTop);
    };


    $('.sidebar a').click(e => {
        if (window.innerWidth >= 640) {
            sidebarArrow.click();
        } else {
            menu.click();
        }

    });

    // createPost();
    // allGenre();
    // createGenre();
    // selectEditGenre();
    // editGenre();

    Barba.init({
        views: [
            {
                namespace: "post_create",
                afterEnter(data) {
                    createPost();
                },
            },
            {
                namespace: "genre_all",
                afterEnter(data) {
                    allGenre();
                },
            },
            {
                namespace: "genre_create",
                afterEnter(data) {
                    createGenre();
                },
            },
            {
                namespace: "genre_edit_withSlug",
                afterEnter(data) {
                    editGenre();
                },
            },
            {
                namespace: "genre_edit",
                afterEnter(data) {
                    selectEditGenre();

                },
            },
            {
                namespace: "category_all",
                afterEnter(data) {
                    allCategory();
                },
            },
            {
                namespace: "category_create",
                afterEnter(data) {
                    createCategory();
                },
            },
            {
                namespace: "category_edit_withSlug",
                afterEnter(data) {
                    editCategory();
                },
            },
            {
                namespace: "category_edit",
                afterEnter(data) {
                    selectEditCategory();

                },
            },
            {
                namespace: "post_all",
                afterEnter(data) {
                    allPost();

                },
            },
        ],
        prevent: ({ el }) => {
            return el.classList.contains('prevent-barba') || el.closest('[role="navigation"]');
        },
        transitions: [
            {
                async leave(data) {
                    const done = this.async();
                    // Your leave transition code here
                    gsap.to(data.current.container, {
                        opacity: 0,
                        duration: 0.5,
                        onComplete: done,
                    });

                    // If you have additional animations, you can chain them with GSAP or use async/await
                },
                async enter(data) {
                    let page_title_heading = $(".page_title_heading");

                    gsap.from(data.next.container, {
                        opacity: 0,
                        duration: 0.5,
                    });

                    setTimeout(() => {
                        page_title_heading.text($("#current_page_title").val());
                    }, 500);



                },
                async once(data) {
                    // Your initial transition code here
                    gsap.from(data.next.container, {
                        opacity: 0,
                        duration: 0.5,
                    });

                    // If you have additional animations, you can chain them with GSAP or use async/await
                },
            },
        ],
    });

    window.barba = Barba;

    $(".loading-overlay").addClass("hidden");
});

function allPost() {


    const search = $("#post_search");
    const filter = $(".search_filter select");

    filter.select2();

    function select_all() {
        const select_all_post = $("#select_all_post");
        const checkBoxes = $(".all_post input[type=checkbox]").not(select_all_post);

        select_all_post.on("change", (e) => {
            if (select_all_post.is(":checked")) {
                checkBoxes.prop('checked', true);
                gsap.to('.checkBoxDelete', { bottom: 0, duration: 0.25 });
            } else {
                checkBoxes.prop('checked', false);
                gsap.to('.checkBoxDelete', { bottom: -80, duration: 0.25 });
            }
        });
    }

    function select_each() {
        const select_all_post = $("#select_all_post");
        $(".all_post input[type=checkbox]").not(select_all_post).on('change', e => {
            let checked = $(".all_post input[type=checkbox]:checked").not(select_all_post);
            if (checked.length > 0) {
                gsap.to('.checkBoxDelete', { bottom: 0, duration: 0.25 });
            } else {
                gsap.to('.checkBoxDelete', { bottom: -80, duration: 0.25 });
            }
        });
    }

    function checkBoxDelete() {
        $('.checkBoxDelete').click(e => {
            wholePageLoader('on');

            let checked = $(".all_post input[type=checkbox]:checked").not(select_all_post);

            if (checked.length > 0) {
                let userConfirm = confirm(`Are you sure to delete ${checked.length} post(s)?`);

                if (userConfirm) {
                    localStorage.setItem('askToDeletePost', true);

                    checked.each(index => {
                        let checkbox = $(checked[index]);
                        let deleteEach = checkbox.closest('tr').find('.delete');
                        deleteEach.click();
                    });

                    localStorage.removeItem('askToDeletePost');
                    gsap.to('.checkBoxDelete', { bottom: -80, duration: 0.25 });
                }

            } else {
                gsapAlert('No item selected!', 'red');
            }

            wholePageLoader('off');
        });
    }


    function allPostDeleteBtn() {
        $(".all_post table .delete").click((e) => {
            let del = $(e.target);

            if (!del.hasClass("delete")) {
                gsapAlert("This is not a Delete button!", "red");
                return;
            }

            if (!del.attr("data-slug")) {
                gsapAlert("Item Slug not found!", "red");
                return;
            }

            let slugUrl = del.attr("data-slug");

            if (!localStorage.getItem('askToDeletePost') && !confirm("You really want to delete this post?")) {
                return;
            }

            wholePageLoader("on");

            $.ajax({
                url: "/admin/post/delete?posts=" + slugUrl,
                type: "GET",
                success: function (res) {
                    wholePageLoader("off");
                    gsapAlert(res.msg, "green");
                    del.closest("tr").remove();
                },
                error: function (xhr, status, error) {
                    wholePageLoader("off");

                    if (xhr.status == 400) {
                        let msg = xhr.responseJSON.msg;
                        gsapAlert(msg, "red");
                    } else if (xhr.status == 404) {
                        let missing = xhr.responseJSON.missing;
                        gsapAlert(
                            `Post with slug: '${missing[0]}' not found!`,
                            "red"
                        );
                    }
                },
            });
        });
    }

    function paginationLinkListener() {
        let anchors = document.body.querySelectorAll(".all_post [role=navigation] a");

        // Loop through each anchor
        anchors.forEach(anchor => {
            anchor.addEventListener('click', e => {
                e.preventDefault();
                gsap.to('.checkBoxDelete', { bottom: -80, duration: 0.25 });
                let href = anchor.href;
                let page = href.split("page=")[1];
                let searchVal = encodeURIComponent(search.val());
                let filterVal = encodeURIComponent(filter.val());
                fetchPosts(searchVal, filterVal, page);
            });
        });
    }

    // search.on("input", (e) => {
    //     wholePageLoader("on");
    //     const searchVal = encodeURIComponent($(e.target).val());
    //     const filterVal = encodeURIComponent(filter.val());

    //     $.ajax({
    //         url: `/admin/post/?search=${searchVal}&filter=${filterVal}`,
    //         type: "GET",
    //         success: function (res) {
    //             wholePageLoader("off");

    //             $("tbody").html(res);
    //             allPostDeleteBtn();
    //         },
    //         error: function (xhr, status, error) {
    //             wholePageLoader("off");
    //             gsapAlert("Error Occured with status:" + xhr.status);
    //         },
    //     });
    // });

    // filter.on("change", () => {
    //     search.trigger("input");
    // });
    function fetchPosts(search, filter, page) {
        // wholePageLoader("on");
        $.ajax({
            url: `/admin/post/?search=${search}&filter=${filter}&page=${page}`,
            type: "GET",
            success: function (res) {
                wholePageLoader("off");
                $(".table").html(res.html);

                reCallFuntions();

            },
            error: function (xhr, status, error) {
                wholePageLoader("off");
                gsapAlert("Error Occured with status:" + xhr.status);
            },
        });
    }

    search.on("input", (e) => {
        const searchVal = encodeURIComponent($(e.target).val());
        const filterVal = encodeURIComponent(filter.val());
        fetchPosts(searchVal, filterVal, 1);
    });

    filter.on("change", () => {
        search.trigger("input");
    });



    function reCallFuntions() {
        select_all();
        select_each();
        checkBoxDelete();
        allPostDeleteBtn();
        paginationLinkListener();
    }

    reCallFuntions();
}


function allGenre() {


    const search = $("#genre_search");
    const filter = $(".search_filter select");

    filter.select2();

    function select_all() {
        const select_all_genre = $("#select_all_genre");

        const checkBoxes = $(".all_genre input[type=checkbox]").not(select_all_genre);

        select_all_genre.on("change", (e) => {
            if (select_all_genre.is(":checked")) {
                checkBoxes.prop('checked', true);
                gsap.to('.checkBoxDelete', { bottom: 0, duration: 0.25 });
            } else {
                checkBoxes.prop('checked', false);
                gsap.to('.checkBoxDelete', { bottom: -80, duration: 0.25 });

            }
        });
    }

    function select_each() {
        const select_all_genre = $("#select_all_genre");

        $(".all_genre input[type=checkbox]").not(select_all_genre).on('change', e => {
            let checked = $(".all_genre input[type=checkbox]:checked").not(select_all_genre);
            if (checked.length > 0) {
                gsap.to('.checkBoxDelete', { bottom: 0, duration: 0.25 });
            } else {
                gsap.to('.checkBoxDelete', { bottom: -80, duration: 0.25 });
            }
        });
    }

    function checkBoxDelete() {
        $('.checkBoxDelete').click(e => {
            let checked = $(".all_genre input[type=checkbox]:checked").not(select_all_genre);
            if (checked.length > 0) {
                if (confirm(`Are you sure to delete ${checked.length} genre(s)?`)) {
                    localStorage.setItem('askToDeleteGenre', true);

                    checked.each(index => {
                        let checkbox = $(checked[index]);
                        let deleteEach = checkbox.closest('tr').find('.delete');
                        deleteEach.click();
                    });

                    localStorage.removeItem('askToDeleteGenre');
                    gsap.to('.checkBoxDelete', { bottom: -80, duration: 0.25 });

                }

            } else {
                gsapAlert('No item selected!', 'red');
            }
        });
    }


    function allGenreDeleteBtn() {
        $(".all_genre table .delete").click((e) => {
            let del = $(e.target);

            if (!del.hasClass("delete")) {
                gsapAlert("This is not a Delete button!", "red");
                return;
            }

            if (!del.attr("data-slug")) {
                gsapAlert("Item Slug not found!", "red");
                return;
            }

            let slugUrl = del.attr("data-slug");

            if (!localStorage.getItem('askToDeleteGenre') && !confirm("You really want to delete this genre?")) {
                return;
            }

            wholePageLoader("on");

            $.ajax({
                url: "/admin/genre/delete?genres=" + slugUrl,
                type: "GET",
                success: function (res) {
                    wholePageLoader("off");
                    gsapAlert(res.msg, "green");
                    del.closest("tr").remove();
                },
                error: function (xhr, status, error) {
                    wholePageLoader("off");

                    if (xhr.status == 400) {
                        let msg = xhr.responseJSON.msg;
                        gsapAlert(msg, "red");
                    } else if (xhr.status == 404) {
                        let missing = xhr.responseJSON.missing;
                        gsapAlert(
                            `Genre with slug: '${missing[0]}' not found!`,
                            "red"
                        );
                    }
                },
            });
        });
    }

    function paginationLinkListener() {
        let anchors = document.body.querySelectorAll(".all_genre [role=navigation] a");

        // Loop through each anchor
        anchors.forEach(anchor => {
            anchor.addEventListener('click', e => {
                e.preventDefault();
                let href = anchor.href;
                let page = href.split("page=")[1];
                let searchVal = encodeURIComponent(search.val());
                let filterVal = encodeURIComponent(filter.val());
                fetchGenres(searchVal, filterVal, page);
            });
        });
    }

    // search.on("input", (e) => {
    //     wholePageLoader("on");
    //     const searchVal = encodeURIComponent($(e.target).val());
    //     const filterVal = encodeURIComponent(filter.val());

    //     $.ajax({
    //         url: `/admin/genre/?search=${searchVal}&filter=${filterVal}`,
    //         type: "GET",
    //         success: function (res) {
    //             wholePageLoader("off");

    //             $("tbody").html(res);
    //             allGenreDeleteBtn();
    //         },
    //         error: function (xhr, status, error) {
    //             wholePageLoader("off");
    //             gsapAlert("Error Occured with status:" + xhr.status);
    //         },
    //     });
    // });

    // filter.on("change", () => {
    //     search.trigger("input");
    // });
    function fetchGenres(search, filter, page) {
        // wholePageLoader("on");
        $.ajax({
            url: `/admin/genre/?search=${search}&filter=${filter}&page=${page}`,
            type: "GET",
            success: function (res) {
                wholePageLoader("off");
                $(".table").html(res.html);

                reCallFuntions();

            },
            error: function (xhr, status, error) {
                wholePageLoader("off");
                gsapAlert("Error Occured with status:" + xhr.status);
            },
        });
    }

    search.on("input", (e) => {
        const searchVal = encodeURIComponent($(e.target).val());
        const filterVal = encodeURIComponent(filter.val());
        fetchGenres(searchVal, filterVal, 1);
    });

    filter.on("change", () => {
        search.trigger("input");
    });



    function reCallFuntions() {
        select_all();
        select_each();
        checkBoxDelete();
        allGenreDeleteBtn();
        paginationLinkListener();
    }
    reCallFuntions();
}

function createGenre() {
    const genre_name = $("input#genre_name");
    const genre_slug = $("input#genre_slug");
    const form = $(".create_genre form");

    genre_name.on("input", (e) => {
        clearTimeout(window.genreNameCheckTimeout);

        const val = genre_name.val();
        const checking = genre_name.next(".checking");

        const errorNode = genre_name.siblings(".error");
        const successNode = genre_name.siblings(".success");

        // HANDLING CHECK
        checking.hasClass("flex")
            ? checking.replaceClass("flex", "hidden")
            : null;

        errorNode.html("");
        successNode.html("");

        genre_name.removeAttr("valid");
        genre_name.removeAttr("invalid");

        if (val.length == 0) {
            return;
        }

        checking.replaceClass("hidden", "flex");

        window.genreNameCheckTimeout = setTimeout(() => {
            const encodeVal = encodeURIComponent(val);

            $.ajax({
                url: "/admin/genre/check?genre=" + encodeVal,
                type: "GET",
                success: function (res) {
                    if (res.found == true) {
                        genre_name.attr("invalid", "");
                        errorNode.html("Genre: " + val + " already exist!");
                    } else {
                        genre_name.attr("valid", "");
                        successNode.html("Create this one");
                    }
                },
                error: function (xhr, status, error) {
                    gsapAlert("Error Occured with status:" + xhr.status);
                },
            });

            checking.replaceClass("flex", "hidden");
        }, 500);

        // HANDILING SLUG
        const radionCheckedVal = $(
            '.create_genre input[name="slug_type"]:checked'
        ).val();

        if (radionCheckedVal === "auto") {
            var name = genre_name
                .val()
                .toLowerCase()
                .replace(/[^a-z0-9]+/g, "-");
            genre_slug.val(name);

            // Check Genre Slug
            checkCreateGenreSlug();
        }
    });

    genre_slug.on("input", function () {
        const radionCheckedVal = $(
            '.create_genre input[name="slug_type"]:checked'
        ).val();

        if (radionCheckedVal === "auto") {
            $(this).val("");
        } else {
            var sanitizedSlug = $(this)
                .val()
                .toLowerCase()
                .replace(/\s+/g, "-")
                .replace(/[^a-z0-9-]/g, "");
            $(this).val(sanitizedSlug);
        }

        // Check Genre Slug
        checkCreateGenreSlug();
    });

    $('.create_genre input[name="slug_type"]').on("change", function () {
        const radionCheckedVal = $(
            '.create_genre input[name="slug_type"]:checked'
        ).val();

        if (radionCheckedVal === "auto") {
            var name = genre_name
                .val()
                .toLowerCase()
                .replace(/[^a-z0-9]+/g, "-");
            genre_slug.val(name);
        }
    });

    // Submitting Data
    form.on("submit", function (event) {
        wholePageLoader("on"); // Turning on the page loader;
        event.preventDefault(); // Prevent the form from submitting the default way
        let formData = new FormData(this);

        $.ajax({
            url: form.attr("action"),
            type: "POST",
            data: formData,
            processData: false,
            contentType: false,

            success: function (res) {
                wholePageLoader("off"); // Turning off the page loader
                form.trigger("reset");
                $(".create_genre .error").html("");
                $(".create_genre .success").html("");

                genre_name.removeAttr("valid");
                genre_name.removeAttr("invalid");

                genre_slug.removeAttr("valid");
                genre_slug.removeAttr("invalid");

                gsapAlert(res.msg, "green");
            },

            error: function (xhr, status, error) {
                wholePageLoader("off"); // Turning off the page loader;

                if (xhr.status == 422) {
                    let errorMessages = "";
                    let i = 1;
                    for (const [field, messages] of Object.entries(
                        xhr.responseJSON.errors
                    )) {
                        errorMessages += `<p>${i}. ${messages.join(", ")}</p>`;
                        i++;
                    }
                    gsapAlert(errorMessages, "red", 4, true);
                } else {
                    gsapAlert(
                        "Failed with error code: " + xhr.status + ` (${error})`,
                        "red"
                    );
                }
            },
        });
    });
}

function selectEditGenre() {
    let select_genre = $(".select_edit_genre select#genre_select");
    select_genre.select2();
    select_genre.on("change", (e) => {
        const val = select_genre.val();
        if (val) {
            Barba.go("/admin/genre/edit/" + val);
        }
    });
}

function editGenre() {
    const genre_id = $("input#genre_id");
    const genre_id_value = genre_id.val();

    const genre_name = $("input#genre_name");
    const currentName = genre_name.val();

    const genre_slug = $("input#genre_slug");
    const currentSlug = genre_slug.val();

    const form = $(".edit_genre form");

    genre_name.on("input", (e) => {
        clearTimeout(window.genreEditNameCheckTimeout);

        const val = genre_name.val();
        const checking = genre_name.next(".checking");

        const errorNode = genre_name.siblings(".error");
        const successNode = genre_name.siblings(".success");

        // HANDLING CHECK
        checking.hasClass("flex")
            ? checking.replaceClass("flex", "hidden")
            : null;

        errorNode.html("");
        successNode.html("");

        genre_name.removeAttr("valid");
        genre_name.removeAttr("invalid");

        if (val.length == 0 || val === currentName) {
            // HANDILING SLUG
            const radionCheckedVal = $(
                '.edit_genre input[name="slug_type"]:checked'
            ).val();

            if (radionCheckedVal === "auto") {
                var name = genre_name
                    .val()
                    .toLowerCase()
                    .replace(/[^a-z0-9]+/g, "-");
                genre_slug.val(name);

                // Check Genre Slug
                checkEditGenreSlug(currentSlug, genre_slug);
            }
            return;
        }

        checking.replaceClass("hidden", "flex");

        window.genreEditNameCheckTimeout = setTimeout(() => {
            const encodeVal = encodeURIComponent(val);
            const encodeName = encodeURIComponent(currentName);

            $.ajax({
                url:
                    "/admin/genre/check?genre=" +
                    encodeVal +
                    "&without=" +
                    encodeName,
                type: "GET",
                success: function (res) {
                    if (res.found == true) {
                        genre_name.attr("invalid", "");
                        errorNode.html("Genre: " + val + " already exist!");
                    } else {
                        genre_name.attr("valid", "");
                        successNode.html("Update with this name");
                    }
                },
                error: function (xhr, status, error) {
                    gsapAlert("Error Occured with status:" + xhr.status);
                },
            });

            checking.replaceClass("flex", "hidden");
        }, 500);

        // HANDILING SLUG
        const radionCheckedVal = $(
            '.edit_genre input[name="slug_type"]:checked'
        ).val();

        if (radionCheckedVal === "auto") {
            var name = genre_name
                .val()
                .toLowerCase()
                .replace(/[^a-z0-9]+/g, "-");
            genre_slug.val(name);

            // Check Genre Slug
            checkEditGenreSlug(currentSlug, genre_slug);
        }
    });

    genre_slug.on("input", function () {
        const radionCheckedVal = $(
            '.edit_genre input[name="slug_type"]:checked'
        ).val();

        if (radionCheckedVal === "auto") {
            $(this).val("");
        } else {
            var sanitizedSlug = $(this)
                .val()
                .toLowerCase()
                .replace(/\s+/g, "-")
                .replace(/[^a-z0-9-]/g, "");
            $(this).val(sanitizedSlug);
        }

        // Check Genre Slug
        checkEditGenreSlug(currentSlug, genre_slug);
    });

    $('.edit_genre input[name="slug_type"]').on("change", function () {
        const radionCheckedVal = $(
            '.edit_genre input[name="slug_type"]:checked'
        ).val();

        if (radionCheckedVal === "auto") {
            var name = genre_name
                .val()
                .toLowerCase()
                .replace(/[^a-z0-9]+/g, "-");
            genre_slug.val(name);

            // Check Genre Slug
            checkEditGenreSlug(currentSlug, genre_slug);
        }
    });

    // Submitting Data
    form.on("submit", function (event) {
        wholePageLoader("on"); // Turning on the page loader;
        event.preventDefault(); // Prevent the form from submitting the default way
        let formData = new FormData(this);

        if (genre_id.val() != genre_id_value) {
            gsapAlert(
                "Couldn't find genre id. Try refreshing the page!",
                "red"
            );
            wholePageLoader("off"); // Turning off the page loader;
            return;
        }

        if (genre_name.val() == currentName) {
            gsapAlert("Genre Name can't be same as before!", "red");
            wholePageLoader("off"); // Turning off the page loader;
            return;
        }

        // if (genre_slug.val() == currentSlug) {
        //     gsapAlert("Genre Slug can't be same as before!", "red");
        //     wholePageLoader("off"); // Turning off the page loader;
        //     return;
        // }

        $.ajax({
            url: form.attr("action"),
            type: "POST",
            data: formData,
            processData: false,
            contentType: false,

            success: function (res) {
                wholePageLoader("off"); // Turning off the page loader
                $(".edit_genre .error").html("");
                $(".edit_genre .success").html("");

                genre_name.removeAttr("valid");
                genre_name.removeAttr("invalid");

                genre_slug.removeAttr("valid");
                genre_slug.removeAttr("invalid");

                gsapAlert(res.msg, "green");
            },

            error: function (xhr, status, error) {
                wholePageLoader("off"); // Turning off the page loader;

                if (xhr.status == 422) {
                    let errorMessages = "";
                    let i = 1;
                    for (const [field, messages] of Object.entries(
                        xhr.responseJSON.errors
                    )) {
                        errorMessages += `<p>${i}. ${messages.join(", ")}</p>`;
                        i++;
                    }
                    gsapAlert(errorMessages, "red", 4, true);
                } else {
                    gsapAlert(
                        "Failed with error code: " + xhr.status + ` (${error})`,
                        "red"
                    );
                }
            },
        });
    });
}

function checkEditGenreSlug(withoutSlug, genre_slug) {
    const errorNode = genre_slug.siblings(".error");
    const successNode = genre_slug.siblings(".success");

    // Check Slug if exist
    clearTimeout(window.genreEditSlugCheckTimeout);

    const val = genre_slug.val();
    const checking = genre_slug.next(".checking");

    // HANDLING CHECK
    checking.hasClass("flex") ? checking.replaceClass("flex", "hidden") : null;

    errorNode.text("");
    successNode.text("");

    genre_slug.removeAttr("valid");
    genre_slug.removeAttr("invalid");

    if (val.length == 0 || val == withoutSlug) {
        return;
    }

    checking.replaceClass("hidden", "flex");

    window.genreEditSlugCheckTimeout = setTimeout(() => {
        const encodeVal = encodeURIComponent(val);
        const encodeSlug = encodeURIComponent(withoutSlug);

        $.ajax({
            url:
                "/admin/genre/checkSlug?slug=" +
                encodeVal +
                "&without=" +
                encodeSlug,
            type: "GET",
            success: function (res) {
                if (res.found == true) {
                    genre_slug.attr("invalid", "");
                    errorNode.text(`Genre Slug: "${val}" already exist!`);
                } else {
                    genre_slug.attr("valid", "");
                    successNode.text("Update with this one");
                }
            },
            error: function (xhr, status, error) {
                gsapAlert("Error Occured with status:" + xhr.status);
            },
        });

        checking.replaceClass("flex", "hidden");
    }, 500);
}

function checkCreateGenreSlug() {
    const genre_slug = $("input#genre_slug");
    const errorNode = genre_slug.siblings(".error");
    const successNode = genre_slug.siblings(".success");

    // Check Slug if exist
    clearTimeout(window.genreSlugCheckTimeout);

    const val = genre_slug.val();
    const checking = genre_slug.next(".checking");

    // HANDLING CHECK
    checking.hasClass("flex") ? checking.replaceClass("flex", "hidden") : null;

    errorNode.text("");
    successNode.text("");

    genre_slug.removeAttr("valid");
    genre_slug.removeAttr("invalid");

    if (val.length == 0) {
        return;
    }

    checking.replaceClass("hidden", "flex");

    window.genreSlugCheckTimeout = setTimeout(() => {
        const encodeVal = encodeURIComponent(val);

        $.ajax({
            url: "/admin/genre/checkSlug?slug=" + encodeVal,
            type: "GET",
            success: function (res) {
                if (res.found == true) {
                    genre_slug.attr("invalid", "");
                    errorNode.text(`Genre Slug: "${val}" already exist!`);
                } else {
                    genre_slug.attr("valid", "");
                    successNode.text("Create this one");
                }
            },
            error: function (xhr, status, error) {
                gsapAlert("Error Occured with status:" + xhr.status);
            },
        });

        checking.replaceClass("flex", "hidden");
    }, 500);
}


function allCategory() {


    const search = $("#category_search");
    const filter = $(".search_filter select");

    filter.select2();

    function select_all() {
        const select_all_category = $("#select_all_category");
        const checkBoxes = $(".all_category input[type=checkbox]").not(select_all_category);

        select_all_category.on("change", (e) => {
            if (select_all_category.is(":checked")) {
                checkBoxes.prop('checked', true);
                gsap.to('.checkBoxDelete', { bottom: 0, duration: 0.25 });
            } else {
                checkBoxes.prop('checked', false);
                gsap.to('.checkBoxDelete', { bottom: -80, duration: 0.25 });

            }
        });
    }

    function select_each() {
        const select_all_category = $("#select_all_category");
        $(".all_category input[type=checkbox]").not(select_all_category).on('change', e => {
            let checked = $(".all_category input[type=checkbox]:checked").not(select_all_category);
            if (checked.length > 0) {
                gsap.to('.checkBoxDelete', { bottom: 0, duration: 0.25 });
            } else {
                gsap.to('.checkBoxDelete', { bottom: -80, duration: 0.25 });
            }
        });

    }
    function checkBoxDelete() {
        $('.checkBoxDelete').click(e => {
            let checked = $(".all_category input[type=checkbox]:checked").not(select_all_category);
            if (checked.length > 0) {
                if (confirm(`Are you sure to delete ${checked.length} category(s)?`)) {
                    localStorage.setItem('askToDeleteCategory', true);

                    checked.each(index => {
                        let checkbox = $(checked[index]);
                        let deleteEach = checkbox.closest('tr').find('.delete');
                        deleteEach.click();
                    });

                    localStorage.removeItem('askToDeleteCategory');
                    gsap.to('.checkBoxDelete', { bottom: -80, duration: 0.25 });

                }

            } else {
                gsapAlert('No item selected!', 'red');
            }
        });
    }


    function allCategoryDeleteBtn() {
        $(".all_category table .delete").click((e) => {
            let del = $(e.target);

            if (!del.hasClass("delete")) {
                gsapAlert("This is not a Delete button!", "red");
                return;
            }

            if (!del.attr("data-slug")) {
                gsapAlert("Item Slug not found!", "red");
                return;
            }

            let slugUrl = del.attr("data-slug");

            if (!localStorage.getItem('askToDeleteCategory') && !confirm("You really want to delete this category?")) {
                return;
            }

            wholePageLoader("on");

            $.ajax({
                url: "/admin/category/delete?categories=" + slugUrl,
                type: "GET",
                success: function (res) {
                    wholePageLoader("off");
                    gsapAlert(res.msg, "green");
                    del.closest("tr").remove();
                },
                error: function (xhr, status, error) {
                    wholePageLoader("off");

                    if (xhr.status == 400) {
                        let msg = xhr.responseJSON.msg;
                        gsapAlert(msg, "red");
                    } else if (xhr.status == 404) {
                        let missing = xhr.responseJSON.missing;
                        gsapAlert(
                            `Category with slug: '${missing[0]}' not found!`,
                            "red"
                        );
                    }
                },
            });
        });
    }

    function paginationLinkListener() {
        let anchors = document.body.querySelectorAll(".all_category [role=navigation] a");

        // Loop through each anchor
        anchors.forEach(anchor => {
            anchor.addEventListener('click', e => {
                e.preventDefault();

                gsap.to('.checkBoxDelete', { bottom: -80, duration: 0.25 });

                let href = anchor.href;
                let page = href.split("page=")[1];
                let searchVal = encodeURIComponent(search.val());
                let filterVal = encodeURIComponent(filter.val());
                fetchCategories(searchVal, filterVal, page);
            });
        });
    }

    // search.on("input", (e) => {
    //     wholePageLoader("on");
    //     const searchVal = encodeURIComponent($(e.target).val());
    //     const filterVal = encodeURIComponent(filter.val());

    //     $.ajax({
    //         url: `/admin/category/?search=${searchVal}&filter=${filterVal}`,
    //         type: "GET",
    //         success: function (res) {
    //             wholePageLoader("off");

    //             $("tbody").html(res);
    //             allCategoryDeleteBtn();
    //         },
    //         error: function (xhr, status, error) {
    //             wholePageLoader("off");
    //             gsapAlert("Error Occured with status:" + xhr.status);
    //         },
    //     });
    // });

    // filter.on("change", () => {
    //     search.trigger("input");
    // });
    function fetchCategories(search, filter, page) {
        // wholePageLoader("on");
        $.ajax({
            url: `/admin/category/?search=${search}&filter=${filter}&page=${page}`,
            type: "GET",
            success: function (res) {
                wholePageLoader("off");
                $(".table").html(res.html);

                reCallFuntions();

            },
            error: function (xhr, status, error) {
                wholePageLoader("off");
                gsapAlert("Error Occured with status:" + xhr.status);
            },
        });
    }

    search.on("input", (e) => {
        const searchVal = encodeURIComponent($(e.target).val());
        const filterVal = encodeURIComponent(filter.val());
        fetchCategories(searchVal, filterVal, 1);
    });

    filter.on("change", () => {
        search.trigger("input");
    });



    function reCallFuntions() {
        select_all();
        select_each();
        checkBoxDelete();
        allCategoryDeleteBtn();
        paginationLinkListener();
    }
    reCallFuntions();
}

function createCategory() {
    const category_name = $("input#category_name");
    const category_slug = $("input#category_slug");
    const form = $(".create_category form");

    category_name.on("input", (e) => {
        clearTimeout(window.categoryNameCheckTimeout);

        const val = category_name.val();
        const checking = category_name.next(".checking");

        const errorNode = category_name.siblings(".error");
        const successNode = category_name.siblings(".success");

        // HANDLING CHECK
        checking.hasClass("flex")
            ? checking.replaceClass("flex", "hidden")
            : null;

        errorNode.html("");
        successNode.html("");

        category_name.removeAttr("valid");
        category_name.removeAttr("invalid");

        if (val.length == 0) {
            return;
        }

        checking.replaceClass("hidden", "flex");

        window.categoryNameCheckTimeout = setTimeout(() => {
            const encodeVal = encodeURIComponent(val);

            $.ajax({
                url: "/admin/category/check?category=" + encodeVal,
                type: "GET",
                success: function (res) {
                    if (res.found == true) {
                        category_name.attr("invalid", "");
                        errorNode.html("Category: " + val + " already exist!");
                    } else {
                        category_name.attr("valid", "");
                        successNode.html("Create this one");
                    }
                },
                error: function (xhr, status, error) {
                    gsapAlert("Error Occured with status:" + xhr.status);
                },
            });

            checking.replaceClass("flex", "hidden");
        }, 500);

        // HANDILING SLUG
        const radionCheckedVal = $(
            '.create_category input[name="slug_type"]:checked'
        ).val();

        if (radionCheckedVal === "auto") {
            var name = category_name
                .val()
                .toLowerCase()
                .replace(/[^a-z0-9]+/g, "-");
            category_slug.val(name);

            // Check Category Slug
            checkCreateCategorySlug();
        }
    });

    category_slug.on("input", function () {
        const radionCheckedVal = $(
            '.create_category input[name="slug_type"]:checked'
        ).val();

        if (radionCheckedVal === "auto") {
            $(this).val("");
        } else {
            var sanitizedSlug = $(this)
                .val()
                .toLowerCase()
                .replace(/\s+/g, "-")
                .replace(/[^a-z0-9-]/g, "");
            $(this).val(sanitizedSlug);
        }

        // Check Category Slug
        checkCreateCategorySlug();
    });

    $('.create_category input[name="slug_type"]').on("change", function () {
        const radionCheckedVal = $(
            '.create_category input[name="slug_type"]:checked'
        ).val();

        if (radionCheckedVal === "auto") {
            var name = category_name
                .val()
                .toLowerCase()
                .replace(/[^a-z0-9]+/g, "-");
            category_slug.val(name);
        }
    });

    // Submitting Data
    form.on("submit", function (event) {
        wholePageLoader("on"); // Turning on the page loader;
        event.preventDefault(); // Prevent the form from submitting the default way
        let formData = new FormData(this);

        $.ajax({
            url: form.attr("action"),
            type: "POST",
            data: formData,
            processData: false,
            contentType: false,

            success: function (res) {
                wholePageLoader("off"); // Turning off the page loader
                form.trigger("reset");
                $(".create_category .error").html("");
                $(".create_category .success").html("");

                category_name.removeAttr("valid");
                category_name.removeAttr("invalid");

                category_slug.removeAttr("valid");
                category_slug.removeAttr("invalid");

                gsapAlert(res.msg, "green");
            },

            error: function (xhr, status, error) {
                wholePageLoader("off"); // Turning off the page loader;

                if (xhr.status == 422) {
                    let errorMessages = "";
                    let i = 1;
                    for (const [field, messages] of Object.entries(
                        xhr.responseJSON.errors
                    )) {
                        errorMessages += `<p>${i}. ${messages.join(", ")}</p>`;
                        i++;
                    }
                    gsapAlert(errorMessages, "red", 4, true);
                } else {
                    gsapAlert(
                        "Failed with error code: " + xhr.status + ` (${error})`,
                        "red"
                    );
                }
            },
        });
    });
}

function selectEditCategory() {
    let select_category = $(".select_edit_category select#category_select");
    select_category.select2();
    select_category.on("change", (e) => {
        const val = select_category.val();
        if (val) {
            Barba.go("/admin/category/edit/" + val);
        }
    });
}

function editCategory() {
    const category_id = $("input#category_id");
    const category_id_value = category_id.val();

    const category_name = $("input#category_name");
    const currentName = category_name.val();

    const category_slug = $("input#category_slug");
    const currentSlug = category_slug.val();

    const form = $(".edit_category form");

    category_name.on("input", (e) => {
        clearTimeout(window.categoryEditNameCheckTimeout);

        const val = category_name.val();
        const checking = category_name.next(".checking");

        const errorNode = category_name.siblings(".error");
        const successNode = category_name.siblings(".success");

        // HANDLING CHECK
        checking.hasClass("flex")
            ? checking.replaceClass("flex", "hidden")
            : null;

        errorNode.html("");
        successNode.html("");

        category_name.removeAttr("valid");
        category_name.removeAttr("invalid");

        if (val.length == 0 || val === currentName) {
            // HANDILING SLUG
            const radionCheckedVal = $(
                '.edit_category input[name="slug_type"]:checked'
            ).val();

            if (radionCheckedVal === "auto") {
                var name = category_name
                    .val()
                    .toLowerCase()
                    .replace(/[^a-z0-9]+/g, "-");
                category_slug.val(name);

                // Check Category Slug
                checkEditCategorySlug(currentSlug, category_slug);
            }
            return;
        }

        checking.replaceClass("hidden", "flex");

        window.categoryEditNameCheckTimeout = setTimeout(() => {
            const encodeVal = encodeURIComponent(val);
            const encodeName = encodeURIComponent(currentName);

            $.ajax({
                url:
                    "/admin/category/check?category=" +
                    encodeVal +
                    "&without=" +
                    encodeName,
                type: "GET",
                success: function (res) {
                    if (res.found == true) {
                        category_name.attr("invalid", "");
                        errorNode.html("Category: " + val + " already exist!");
                    } else {
                        category_name.attr("valid", "");
                        successNode.html("Update with this name");
                    }
                },
                error: function (xhr, status, error) {
                    gsapAlert("Error Occured with status:" + xhr.status);
                },
            });

            checking.replaceClass("flex", "hidden");
        }, 500);

        // HANDILING SLUG
        const radionCheckedVal = $(
            '.edit_category input[name="slug_type"]:checked'
        ).val();

        if (radionCheckedVal === "auto") {
            var name = category_name
                .val()
                .toLowerCase()
                .replace(/[^a-z0-9]+/g, "-");
            category_slug.val(name);

            // Check Category Slug
            checkEditCategorySlug(currentSlug, category_slug);
        }
    });

    category_slug.on("input", function () {
        const radionCheckedVal = $(
            '.edit_category input[name="slug_type"]:checked'
        ).val();

        if (radionCheckedVal === "auto") {
            $(this).val("");
        } else {
            var sanitizedSlug = $(this)
                .val()
                .toLowerCase()
                .replace(/\s+/g, "-")
                .replace(/[^a-z0-9-]/g, "");
            $(this).val(sanitizedSlug);
        }

        // Check Category Slug
        checkEditCategorySlug(currentSlug, category_slug);
    });

    $('.edit_category input[name="slug_type"]').on("change", function () {
        const radionCheckedVal = $(
            '.edit_category input[name="slug_type"]:checked'
        ).val();

        if (radionCheckedVal === "auto") {
            var name = category_name
                .val()
                .toLowerCase()
                .replace(/[^a-z0-9]+/g, "-");
            category_slug.val(name);

            // Check Category Slug
            checkEditCategorySlug(currentSlug, category_slug);
        }
    });

    // Submitting Data
    form.on("submit", function (event) {
        wholePageLoader("on"); // Turning on the page loader;
        event.preventDefault(); // Prevent the form from submitting the default way
        let formData = new FormData(this);

        if (category_id.val() != category_id_value) {
            gsapAlert(
                "Couldn't find category id. Try refreshing the page!",
                "red"
            );
            wholePageLoader("off"); // Turning off the page loader;
            return;
        }

        if (category_name.val() == currentName) {
            gsapAlert("Category Name can't be same as before!", "red");
            wholePageLoader("off"); // Turning off the page loader;
            return;
        }

        // if (category_slug.val() == currentSlug) {
        //     gsapAlert("Category Slug can't be same as before!", "red");
        //     wholePageLoader("off"); // Turning off the page loader;
        //     return;
        // }

        $.ajax({
            url: form.attr("action"),
            type: "POST",
            data: formData,
            processData: false,
            contentType: false,

            success: function (res) {
                wholePageLoader("off"); // Turning off the page loader
                $(".edit_category .error").html("");
                $(".edit_category .success").html("");

                category_name.removeAttr("valid");
                category_name.removeAttr("invalid");

                category_slug.removeAttr("valid");
                category_slug.removeAttr("invalid");

                gsapAlert(res.msg, "green");
            },

            error: function (xhr, status, error) {
                wholePageLoader("off"); // Turning off the page loader;

                if (xhr.status == 422) {
                    let errorMessages = "";
                    let i = 1;
                    for (const [field, messages] of Object.entries(
                        xhr.responseJSON.errors
                    )) {
                        errorMessages += `<p>${i}. ${messages.join(", ")}</p>`;
                        i++;
                    }
                    gsapAlert(errorMessages, "red", 4, true);
                } else {
                    gsapAlert(
                        "Failed with error code: " + xhr.status + ` (${error})`,
                        "red"
                    );
                }
            },
        });
    });
}

function checkEditCategorySlug(withoutSlug, category_slug) {
    const errorNode = category_slug.siblings(".error");
    const successNode = category_slug.siblings(".success");

    // Check Slug if exist
    clearTimeout(window.categoryEditSlugCheckTimeout);

    const val = category_slug.val();
    const checking = category_slug.next(".checking");

    // HANDLING CHECK
    checking.hasClass("flex") ? checking.replaceClass("flex", "hidden") : null;

    errorNode.text("");
    successNode.text("");

    category_slug.removeAttr("valid");
    category_slug.removeAttr("invalid");

    if (val.length == 0 || val == withoutSlug) {
        return;
    }

    checking.replaceClass("hidden", "flex");

    window.categoryEditSlugCheckTimeout = setTimeout(() => {
        const encodeVal = encodeURIComponent(val);
        const encodeSlug = encodeURIComponent(withoutSlug);

        $.ajax({
            url:
                "/admin/category/checkSlug?slug=" +
                encodeVal +
                "&without=" +
                encodeSlug,
            type: "GET",
            success: function (res) {
                if (res.found == true) {
                    category_slug.attr("invalid", "");
                    errorNode.text(`Category Slug: "${val}" already exist!`);
                } else {
                    category_slug.attr("valid", "");
                    successNode.text("Update with this one");
                }
            },
            error: function (xhr, status, error) {
                gsapAlert("Error Occured with status:" + xhr.status);
            },
        });

        checking.replaceClass("flex", "hidden");
    }, 500);
}

function checkCreateCategorySlug() {
    const category_slug = $("input#category_slug");
    const errorNode = category_slug.siblings(".error");
    const successNode = category_slug.siblings(".success");

    // Check Slug if exist
    clearTimeout(window.categorySlugCheckTimeout);

    const val = category_slug.val();
    const checking = category_slug.next(".checking");

    // HANDLING CHECK
    checking.hasClass("flex") ? checking.replaceClass("flex", "hidden") : null;

    errorNode.text("");
    successNode.text("");

    category_slug.removeAttr("valid");
    category_slug.removeAttr("invalid");

    if (val.length == 0) {
        return;
    }

    checking.replaceClass("hidden", "flex");

    window.categorySlugCheckTimeout = setTimeout(() => {
        const encodeVal = encodeURIComponent(val);

        $.ajax({
            url: "/admin/category/checkSlug?slug=" + encodeVal,
            type: "GET",
            success: function (res) {
                if (res.found == true) {
                    category_slug.attr("invalid", "");
                    errorNode.text(`Category Slug: "${val}" already exist!`);
                } else {
                    category_slug.attr("valid", "");
                    successNode.text("Create this one");
                }
            },
            error: function (xhr, status, error) {
                gsapAlert("Error Occured with status:" + xhr.status);
            },
        });

        checking.replaceClass("flex", "hidden");
    }, 500);
}
