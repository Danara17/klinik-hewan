// import { InertiaLink } from "@inertiajs/inertia-react";
import hewan from "/public/static/hewan-article.jpg";
import presiden from "/public/static/presiden.jpg";
import madrid from "/public/static/real-madrid.jpeg";
import indonesia from "/public/static/timnas-indonesia.jpg";
import "slick-carousel/slick/slick.css";
import "slick-carousel/slick/slick-theme.css";
import Slider from "react-slick";

export default function ArticleContent({ posts }) {
    const settings = {
        infinite: true,
        speed: 500,
        slidesToShow: 3,
        slidesToScroll: 1,
        className: "slider variable-width",
        variableWidth: true,
        adaptiveHeight: true,
    };
    return (
        <>
            <article className="py-24">
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
                                                <img
                                                    src={hewan}
                                                    alt=""
                                                    className="w-full h-auto lg:h-[358px] rounded-tl-lg rounded-tr-lg"
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
                                                <p className="text-md text-justify">
                                                    {post.body
                                                        .split(" ")
                                                        .slice(0, 25)
                                                        .join(" ")}
                                                    ...
                                                </p>
                                            </div>
                                        </>
                                    ))}

                                    <div className="mx-3 border-t">
                                        <div className="pt-4">
                                            <h1 className="font-semibold">
                                                BERITA UTAMA LAINNYA
                                            </h1>
                                        </div>

                                        {/* <div className="pt-2 flex gap-3 pb-14">
                                            <div className="flex gap-3">
                                                {posts
                                                    .slice(1, 4)
                                                    .map((post) => (
                                                        <div className="flex flex-col w-full lg:w-44 border-2 rounded-xl">
                                                            <div className="flex justify-center">
                                                                <img
                                                                    src={
                                                                        presiden
                                                                    }
                                                                    alt=""
                                                                    className="w-full lg:w-auto rounded-tl-lg rounded-tr-lg"
                                                                />
                                                            </div>
                                                            <div className="mx-3">
                                                                <div className="flex">
                                                                    <h1 className="text-sm">
                                                                        <a
                                                                            href={`/article/${post.id}/${post.title}`}
                                                                            className="text-center"
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
                                            </div>
                                        </div> */}

                                        <div className="pt-2 pb-4">
                                            <Slider {...settings} className="">
                                                {posts
                                                    .slice(1, 4)
                                                    .map((post) => (
                                                        <div
                                                            key={post.id}
                                                            className="flex w-full lg:w-44 border-2 rounded-xl"
                                                            style={{
                                                                width: 250,
                                                            }}
                                                        >
                                                            <div className="flex justify-center">
                                                                <img
                                                                    src={
                                                                        presiden
                                                                    }
                                                                    alt=""
                                                                    className="w-full h-auto rounded-tl-lg rounded-tr-lg"
                                                                />
                                                            </div>
                                                            <div className="mx-3">
                                                                <div className="flex">
                                                                    <h1 className="text-sm text-center">
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

                                {posts.slice(6).map((post) => (
                                    <>
                                        <div className="py-1 hidden lg:inline">
                                            <div className="flex justify-between items-center">
                                                <div>
                                                    <h1 className="text-lg font-bold mt-1">
                                                        <a
                                                            href={`/article/${post.id}/${post.title}`}
                                                        >
                                                            {post.title}
                                                        </a>
                                                    </h1>
                                                    <p className="mt-1 text-justify">
                                                        {post.body
                                                            .split(" ")
                                                            .slice(0, 25)
                                                            .join(" ")}
                                                        ...
                                                    </p>
                                                </div>
                                                {/* <div className="w-20">
                                                    <img
                                                        src={hewan}
                                                        alt=""
                                                        className=""
                                                    />
                                                </div> */}
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
                                                    <img
                                                        src={madrid}
                                                        alt=""
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
                                                    <p className="mt-1">
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
                                                    <img
                                                        src={indonesia}
                                                        alt=""
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
                                                    <p className="mt-1">
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
                                            <div className="py-1 inline lg:hidden">
                                                <h1 className="text-lg font-bold mt-1">
                                                    <a
                                                        href={`/article/${post.id}/${post.title}`}
                                                    >
                                                        {post.title}
                                                    </a>
                                                </h1>
                                                <p className="mt-1 text-justify">
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

                                <div className="lg:flex flex-col gap-7 items-start w-full text-wrap hidden lg:inline">
                                    <h1 className="text-xl">Topik Hangat</h1>
                                    <>
                                        <a href="" className="text-l">
                                            <span className="text-blue-600">
                                                #{" "}
                                            </span>
                                            {/* {data.name} */}
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
