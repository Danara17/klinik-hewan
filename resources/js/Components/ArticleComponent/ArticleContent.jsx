import "slick-carousel/slick/slick.css";
import "slick-carousel/slick/slick-theme.css";
import Slider from "react-slick";
import { LazyLoadImage } from "react-lazy-load-image-component";

export default function ArticleContent({ posts }) {
    const settings = {
        infinite: false,
        speed: 500,
        slidesToShow: 3,
        slidesToScroll: 1,
        className: "slider variable-width",
        variableWidth: true,
        adaptiveHeight: true,
        responsive: [
            {
                breakpoint: 768,
                settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1,
                    infinite: true,
                },
            },
            {
                breakpoint: 480,
                settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1,
                    infinite: true,
                },
            },
        ],
    };
    return (
        <>
            <article className="py-24 ">
                <div className="mx-auto w-full max-w-screen-xl p-5 py-4">
                    <div className="flex flex-col gap-4">
                        {posts.slice(0, 1).map((post) => (
                            <>
                                <div className="bg-blue-600 p-3 rounded-b-xl font-bold flex gap-3 items-center">
                                    <span className="p-1 bg-white text-blue-600 rounded-xl">
                                        Headline Hari ini
                                    </span>
                                    <span className="text-white">
                                        {post.title}
                                    </span>
                                </div>
                            </>
                        ))}

                        <div className="flex flex-col lg:flex-row justify-between gap-8">
                            <div className="flex flex-col gap-8  w-full lg:w-[650px]">
                                <div className="bg-slate-100 flex flex-col border-2 gap-5 rounded-md">
                                    {posts.slice(0, 1).map((post) => (
                                        <>
                                            <div>
                                                <LazyLoadImage
                                                    src={`http://localhost:8000/storage/images/${post.image}`}
                                                    alt="imageTitle"
                                                    className="w-full h-auto  rounded-tl-lg rounded-tr-lg"
                                                    loading="lazy"
                                                />
                                            </div>
                                            <div className="mx-3">
                                                <h1 className="text-2xl font-bold mb-2">
                                                    <a
                                                        href={`/article/${post.id}/${post.title}`}
                                                    >
                                                        {post.title}
                                                    </a>
                                                </h1>
                                                <p className="text-xs md:text-base text-justify">
                                                    {post.body
                                                        .split(" ")
                                                        .slice(0, 25)
                                                        .join(" ")}
                                                    ...
                                                </p>
                                            </div>
                                        </>
                                    ))}

                                    <div className="mx-4 border-t">
                                        <div className="pt-4">
                                            <h1 className="font-semibold">
                                                BERITA UTAMA LAINNYA
                                            </h1>
                                        </div>

                                        <div className="pt-2 pb-4 ">
                                            <div className=" p-3">
                                                <Slider
                                                    {...settings}
                                                    className=""
                                                >
                                                    {posts
                                                        .slice(1, 4)
                                                        .map((post) => (
                                                            <div
                                                                key={post.id}
                                                                className="flex w-full h-40 lg:w-44 border-2 rounded-xl"
                                                                style={{
                                                                    width: 170,
                                                                }}
                                                            >
                                                                <div className="flex justify-center">
                                                                    <LazyLoadImage
                                                                        src={`http://localhost:8000/storage/images/${post.image}`}
                                                                        alt=""
                                                                        className="w-full h-auto rounded-tl-lg rounded-tr-lg"
                                                                        loading="blur"
                                                                    />
                                                                </div>
                                                                <div className="mx-3">
                                                                    <div className="">
                                                                        <h1 className="text-xs text-center">
                                                                            <a
                                                                                href={`/article/${post.id}/${post.title}`}
                                                                            >
                                                                                {
                                                                                    post.title
                                                                                }
                                                                            </a>
                                                                        </h1>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        ))}
                                                </Slider>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                {posts.slice(6).map((post) => (
                                    <>
                                        <div className=" py-2 hidden lg:inline">
                                            <div className="flex">
                                                <LazyLoadImage
                                                    src={`http://localhost:8000/storage/images/${post.image}`}
                                                    alt=""
                                                    className="w-[200px] h-[112px] rounded-tl-lg rounded-lg object-cover flex-shrink-0"
                                                />

                                                <div className="ml-4 flex flex-col">
                                                    <div>
                                                        <h1 className="text-lg font-bold mt-1">
                                                            <a
                                                                href={`/article/${post.id}/${post.title}`}
                                                            >
                                                                {post.title}
                                                            </a>
                                                        </h1>
                                                    </div>
                                                    <div>
                                                        <p className="mt-1  text-justify">
                                                            {post.body
                                                                .split(" ")
                                                                .slice(0, 25)
                                                                .join(" ")}
                                                            ...
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </>
                                ))}
                            </div>

                            <div className="flex flex-col lg:flex-row items-start w-full gap-6">
                                <div className="flex flex-col gap-5 items-start w-full lg:w-[750px]">
                                    <div className="flex flex-col border-2 rounded-lg mb-1">
                                        {posts.slice(4, 5).map((post) => (
                                            <>
                                                <div className="flex justify-start">
                                                    <LazyLoadImage
                                                        src={`http://localhost:8000/storage/images/${post.image}`}
                                                        alt="imageTitle"
                                                        className="w-full h-auto rounded-tl-lg rounded-tr-lg"
                                                    />
                                                </div>
                                                <div className="ml-1 py-1">
                                                    <h1 className="text-lg font-bold mt-1">
                                                        <a
                                                            href={`/article/${post.id}/${post.title}`}
                                                        >
                                                            {post.title}
                                                        </a>
                                                    </h1>
                                                    <p className="mt-1 text-xs md:text-base text-justify">
                                                        {post.body
                                                            .split(" ")
                                                            .slice(0, 25)
                                                            .join(" ")}
                                                        ...
                                                    </p>
                                                </div>
                                            </>
                                        ))}
                                    </div>

                                    <div className="flex flex-col border-2 rounded-lg mb-1">
                                        {posts.slice(5, 6).map((post) => (
                                            <>
                                                <div className="flex justify-start">
                                                    <LazyLoadImage
                                                        src={`http://localhost:8000/storage/images/${post.image}`}
                                                        alt="imageTitle"
                                                        className="w-full h-auto lg:h-[215px] rounded-tl-lg rounded-tr-lg"
                                                    />
                                                </div>
                                                <div className="ml-1 py-1">
                                                    <h1 className="text-lg font-bold mt-1">
                                                        <a
                                                            href={`/article/${post.id}/${post.title}`}
                                                        >
                                                            {post.title}
                                                        </a>
                                                    </h1>
                                                    <p className="mt-1 text-xs md:text-base text-justify">
                                                        {post.body
                                                            .split(" ")
                                                            .slice(0, 25)
                                                            .join(" ")}
                                                        ...
                                                    </p>
                                                </div>
                                            </>
                                        ))}
                                    </div>

                                    {posts.slice(6).map((post) => (
                                        <>
                                            <div className="gap-5 inline lg:hidden py-1">
                                                <div className="flex items-center gap-14">
                                                    <div className="flex-grow flex flex-col">
                                                        <h1 className="text-lg font-bold mt-1">
                                                            <a
                                                                href={`/article/${post.id}/${post.title}`}
                                                            >
                                                                {post.title}
                                                            </a>
                                                        </h1>
                                                        <p className="mt-1 text-xs md:text-base text-justify">
                                                            {post.body
                                                                .split(" ")
                                                                .slice(0, 25)
                                                                .join(" ")}
                                                            ...
                                                        </p>
                                                    </div>
                                                    <div className="flex-shrink-0 ">
                                                        <LazyLoadImage
                                                            src={`http://localhost:8000/storage/images/${post.image}`}
                                                            alt=""
                                                            className="w-16 h-16 object-cover"
                                                        />
                                                    </div>
                                                </div>
                                            </div>
                                        </>
                                    ))}
                                </div>

                                <div className="lg:flex flex-col gap-7 items-start w-full text-wrap hidden lg:inline">
                                    <h1 className="text-xl">Topik Hangat</h1>
                                    <>
                                        <a href="" className="text-l">
                                            <span className="text-blue-600">
                                                #
                                            </span>
                                        </a>
                                    </>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </article>
        </>
    );
}
