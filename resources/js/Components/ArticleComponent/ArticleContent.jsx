import {
    BookmarkPlusIcon,
    Ellipsis,
    Heart,
    MessageCircle,
    Search,
    Share,
} from "lucide-react";
import { useState } from "react";
import { Inertia } from "@inertiajs/inertia";

export default function ArticleContent({ posts, searchQuery }) {
    const [query, setQuery] = useState(searchQuery || "");

    const handleSearch = (e) => {
        e.preventDefault();
        Inertia.get("/search", { query });
    };
    return (
        <>
            <div className="py-20">
                <div className="mx-auto w-full max-w-screen-xl p-5 py-4">
                    <form onSubmit={handleSearch} className="mb-6 relative">
                        <span className="absolute inset-y-0 left-0 flex items-center pl-3">
                            <Search className="text-gray-500" />
                        </span>
                        <input
                            type="text"
                            value={query}
                            onChange={(e) => setQuery(e.target.value)}
                            placeholder="Search articles..."
                            className="w-full md:w-64 p-2 pl-10 border rounded-full"
                        />
                    </form>

                    <div className="grid grid-cols-1 gap-3">
                        {posts.map((post) => (
                            <>
                                <div key={post.id} className=" gap-3">
                                    <div className="flex flex-col">
                                        <div className="grid gap-3">
                                            <div className="flex items-center gap-3 lg:mt-3">
                                                <img
                                                    src="https://images.unsplash.com/photo-1570295999919-56ceb5ecca61?ixlib=rb-4.0.3&amp;ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&amp;auto=format&amp;fit=crop&amp;w=1760&amp;q=80"
                                                    alt="author"
                                                    className="rounded-full w-9 "
                                                />
                                                <p className="text-xs lg:text-sm">
                                                    {post.author.name}
                                                </p>
                                            </div>

                                            <div className="grid lg:gap-8">
                                                <div className="grid gap-4">
                                                    <div className="flex justify-between items-center gap-16">
                                                        <div className="gap-3">
                                                            <h1 className="text-sm lg:text-xl font-semibold ">
                                                                <a
                                                                    href={`/article/${post.id}/${post.title}`}
                                                                >
                                                                    {post.title}
                                                                </a>
                                                            </h1>
                                                            <p className=" text-xs md:text-base lg:text-lg text-justify break-words">
                                                                {post.body
                                                                    .split("")
                                                                    .slice(
                                                                        0,
                                                                        250
                                                                    )
                                                                    .join("")}
                                                            </p>
                                                        </div>

                                                        <div className="flex-shrink-0 ">
                                                            <img
                                                                src={`http://localhost:8000/storage/images/${post.image}`}
                                                                alt=""
                                                                className="hidden lg:inline lg:w-32 lg:h-20 object-cover"
                                                            />
                                                        </div>
                                                    </div>

                                                    <div className="gap-2">
                                                        {post.categories.map(
                                                            (category) => (
                                                                <span
                                                                    key={
                                                                        category.id
                                                                    }
                                                                    className="text-xs inline-block bg-gray-200 hover:bg-gray-600 rounded-full px-2 md:px-3 py-1 md:py-2 sm:text-sm font-semibold text-gray-700 hover:text-white mr-2 mb-2"
                                                                >
                                                                    {
                                                                        category.name
                                                                    }
                                                                </span>
                                                            )
                                                        )}
                                                    </div>
                                                </div>

                                                <div className="flex justify-between">
                                                    <div className="flex gap-5">
                                                        <Heart className="hover:opacity-65 w-4 md:w-12" />
                                                        <MessageCircle className="hover:opacity-65 w-4 md:w-12" />
                                                    </div>

                                                    <div className="flex gap-5">
                                                        <BookmarkPlusIcon className="hover:opacity-65 w-4 md:w-12" />
                                                        <Share className="hover:opacity-65 w-4 md:w-12" />
                                                        <Ellipsis className="hover:opacity-65 w-4 md:w-12" />
                                                    </div>
                                                </div>
                                            </div>
                                            <hr />
                                        </div>
                                    </div>
                                </div>
                            </>
                        ))}
                    </div>
                </div>
            </div>
        </>
    );
}
