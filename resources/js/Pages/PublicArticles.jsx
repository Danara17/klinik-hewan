import React from "react";
import Navbar from "../Components/HomeComponent/Navbar";
import ArticleContent from "../Components/ArticleComponent/ArticleContent";
import Footer from "../Components/HomeComponent/Footer";

export default function PublicArticles({ posts }) {
    return (
        <>
            <Navbar />
            <ArticleContent posts={posts} />
            <Footer />
        </>
    );
}
