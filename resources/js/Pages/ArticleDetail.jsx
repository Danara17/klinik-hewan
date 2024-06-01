import React from "react";
import Navbar from "../Components/HomeComponent/Navbar";
import Footer from "../Components/HomeComponent/Footer";
import {
    BookmarkPlus,
    Ellipsis,
    Heart,
    MessageCircle,
    Share,
} from "lucide-react";

export default function ArticleDetail({ detailArticle }) {
    return (
        <>
            <Navbar />
            <div className="py-24">
                <div className="mx-auto w-full max-w-screen-xl p-5 py-4">
                    <div className="flex flex-col gap-4 py-6">
                        <div>
                            <h1 className="md:text-5xl text-2xl font-bold mb-5">
                                {detailArticle.title}
                            </h1>
                        </div>
                        <div className="flex items-center gap-4">
                            <div className="flex">
                                <img
                                    src="https://images.unsplash.com/photo-1570295999919-56ceb5ecca61?ixlib=rb-4.0.3&amp;ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&amp;auto=format&amp;fit=crop&amp;w=1760&amp;q=80"
                                    alt="author"
                                    className="rounded-full lg:w-[64px] w-9"
                                />
                            </div>

                            <div className="flex flex-col text-sm md:text-base">
                                <p>{detailArticle.author.name}</p>
                                <p>{detailArticle.published_at}</p>
                            </div>
                        </div>

                        <hr />
                        <div className="flex lg:justify-between gap-4">
                            <div className="flex lg:gap-14 gap-4">
                                <Heart className="hover:opacity-65" />
                                <MessageCircle className="hover:opacity-65" />
                            </div>

                            <div className="flex lg:gap-14 gap-4">
                                <BookmarkPlus className="hover:opacity-65" />
                                <Share className="hover:opacity-65" />
                                <Ellipsis className="hover:opacity-65" />
                            </div>
                        </div>
                        <hr />
                        <div className="text-xl text-justify">
                            <p>{detailArticle.body}</p>
                        </div>
                    </div>
                </div>
            </div>
            <Footer />
        </>
    );
}
