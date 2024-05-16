import React from "react";
import boro from "/public/static/boro.jpg";

export default function ArticleContent() {
    

    return (
        <>
            <article className="py-28">
                <div className="mx-auto w-full max-w-screen-xl p-4 py-8">
                    <div className="flex justify-start gap-24">
                        <div className="flex w-5/12 ">
                            <div className="bg-white flex flex-col w-fit border gap-5 rounded-md">
                                <div>
                                    <img
                                        src={boro}
                                        alt=""
                                        className="w-[640px] h-[358px]"
                                    />
                                </div>
                                <div className="mx-3">
                                    <h1 className="text-2xl font-bold">
                                        <a href="">
                                            HEBOH! 7 keajaiban dunia lainnya!!
                                        </a>
                                    </h1>
                                    <p className="text-sm">
                                        Lorem, ipsum dolor sit amet consectetur
                                        adipisicing elit. Vitae et tempora
                                        dolores rem possimus magni est
                                        voluptates at dignissim
                                    </p>
                                </div>

                                <div className="mx-3 border-t border-t-blue-600 pb-2">
                                    <div className="pt-4">
                                        <h1 className="font-semibold ">
                                            BERITA UTAMA LAINNYA
                                        </h1>
                                    </div>

                                    <div className="pt-2 flex gap-3">
                                        <div className="flex gap-3">
                                            <div className="flex flex-col w-44 border rounded-xl">
                                                <div className="flex justify-center ">
                                                    <img src={boro} alt="" />
                                                </div>
                                                <div className="mx-3">
                                                    <div className="flex text-center">
                                                        <h1 className="text-sm">
                                                            <a href="">
                                                                HEBOH! 7
                                                                keajaiban dunia
                                                                lainnya!!
                                                            </a>
                                                        </h1>
                                                    </div>
                                                </div>
                                            </div>

                                            <div className="flex flex-col w-44 border rounded-xl">
                                                <div className="flex justify-center ">
                                                    <img src={boro} alt="" />
                                                </div>
                                                <div className="mx-3">
                                                    <div className="flex text-center">
                                                        <h1 className="text-sm">
                                                            <a href="">
                                                                HEBOH! 7
                                                                keajaiban dunia
                                                                lainnya!!
                                                            </a>
                                                        </h1>
                                                    </div>
                                                </div>
                                            </div>

                                            <div className="flex flex-col w-44 border rounded-xl">
                                                <div className="flex justify-center ">
                                                    <img src={boro} alt="" />
                                                </div>
                                                <div className="mx-3">
                                                    <div className="flex text-center">
                                                        <h1 className="text-sm">
                                                            <a href="">
                                                                HEBOH! 7
                                                                keajaiban dunia
                                                                lainnya!!
                                                            </a>
                                                        </h1>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div className="flex flex-col gap-4">
                            <h1 className="text-xl">Topik Hangat</h1>
                            <a href="" className="text-l">
                                <span className="text-blue-600"># </span>
                                Edukasi Pemilik Hewan
                            </a>
                            <a href="" className="text-l">
                                <span className="text-blue-600"># </span>
                                Informasi Spesies
                            </a>
                            <a href="" className="text-l">
                                <span className="text-blue-600"># </span>
                                Kesehatan Hewan
                            </a>
                            <a href="" className="text-l">
                                <span className="text-blue-600"># </span>
                                Kisah Sukses
                            </a>
                            <a href="" className="text-l">
                                <span className="text-blue-600"># </span>
                                Konsultasi Kesehatan Hewan
                            </a>
                            <a href="" className="text-l">
                                <span className="text-blue-600"># </span>
                                Perawatan Hewan
                            </a>
                            <a href="" className="text-l">
                                <span className="text-blue-600"># </span>
                                Pertanyaan Umum
                            </a>
                            <a href="" className="text-l">
                                <span className="text-blue-600"># </span>
                                Prosedur Medis
                            </a>
                        </div>
                    </div>
                </div>
            </article>
        </>
    );
}
