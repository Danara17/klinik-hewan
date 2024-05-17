import React from "react";
import hewan from "/public/static/hewan-article.jpg";
import presiden from "/public/static/presiden.jpg";
import winter from "/public/static/tech-winter.jpg";
import gaza from "/public/static/berita-gaza.jpg";
import madrid from "/public/static/real-madrid.jpeg";
import indonesia from "/public/static/timnas-indonesia.jpg";

export default function ArticleContent() {
    return (
        <>
            <article className="py-24">
                <div className="mx-auto w-full max-w-screen-xl p-1 py-4">
                    <div className="flex justify-between gap-24">
                        <div className="flex w-5/12 ">
                            <div className="bg-white flex flex-col w-fit border-2 border gap-5 rounded-md">
                                <div>
                                    <img
                                        src={hewan}
                                        alt=""
                                        className="w-[640px] h-[358px] rounded-tl-lg rounded-tr-lg"
                                    />
                                </div>
                                <div className="mx-3">
                                    <h1 className="text-2xl font-bold mb-2">
                                        <a href="https://mediaindonesia.com/humaniora/592619/tidak-hanya-rabies-ini-7-penyakit-dari-hewan-yang-bisa-menular-ke-manusia">
                                            7 Penyakit Hewan Yang Menular!!
                                        </a>
                                    </h1>
                                    <p className="text-sm">
                                        Dalam beberapa bulan terakhir, masyarakat Indonesia diramaikan dengan kasus wabah rabies. Di antaranya terjadi di Nusa Tenggara Timur dan Bali.
                                        Selain rabies, ternyata juga banyak penyakit dari hewan lainnya yang bisa ditularkan ke manusia.
                                    </p>
                                </div>

                                <div className="mx-3 border-t ">
                                    <div className="pt-4">
                                        <h1 className="font-semibold ">
                                            BERITA UTAMA LAINNYA
                                        </h1>
                                    </div>

                                    <div className="pt-2 flex gap-3">
                                        <div className="flex gap-3">
                                            <div className="flex flex-col w-44 border-2 border rounded-xl">
                                                <div className="flex justify-center ">
                                                    <img src={presiden} alt="" className="rounded-tl-lg rounded-tr-lg" />
                                                </div>
                                                <div className="mx-3">
                                                    <div className="flex text-center">
                                                        <h1 className="text-sm">
                                                            <a href="https://news.detik.com/berita/d-7308362/pr-prabowo-usai-resmi-jadi-presiden-terpilih">
                                                                Prabowo Usai Resmi Jadi Presiden Terpilih!!
                                                            </a>
                                                        </h1>
                                                    </div>
                                                </div>
                                            </div>

                                            <div className="flex flex-col w-44 border-2 border rounded-xl">
                                                <div className="flex justify-center ">
                                                    <img src={winter} alt="" className="rounded-tl-lg rounded-tr-lg" />
                                                </div>
                                                <div className="mx-3">
                                                    <div className="flex text-center">
                                                        <h1 className="text-sm">
                                                            <a href="https://www.kompas.id/baca/ekonomi/2023/12/29/tahun-2024-badai-tech-winter-belum-pasti-berakhir">
                                                                Tahun 2024, Tech Winter Belum Pasti Berakhir
                                                            </a>
                                                        </h1>
                                                    </div>
                                                </div>
                                            </div>

                                            <div className="flex flex-col w-44 border-2 border rounded-xl">
                                                <div className="flex justify-center ">
                                                    <img src={gaza} alt="" className="rounded-tl-lg rounded-tr-lg" />
                                                </div>
                                                <div className="mx-3">
                                                    <div className="flex text-center">
                                                        <h1 className="text-sm">
                                                            <a href="https://www.antaranews.com/berita/4108641/korban-tewas-di-gaza-capai-35272-dan-serangan-israel-tak-berhenti">
                                                                Korban tewas di Gaza capai 35.272 dan serangan Israel tak berhenti
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

                        <div className="flex gap-5 items-start">
    <div className="flex flex-col gap-5 items-start w-[750px]">
        <div className="flex flex-col border-2 border rounded-lg mb-1">
            <div className="flex justify-start ">
                <img src={madrid} alt="" className="w-full h-[215px] rounded-tl-lg rounded-tr-lg" />
            </div>
            <div className="ml-1 py-1">
                <h1 className="text-lg font-bold mt-1">
                    <a href="https://www.cnbcindonesia.com/research/20240509055329-128-536919/real-madrid-ke-final-liga-champions-incar-rekor-juara-ke-15">
                        Real Madrid ke Final Liga Champions
                    </a>
                </h1>
                <p className="mt-1">
                    Real Madrid melaju ke final Liga Champions 2023-2024 setelah mengalahkan Bayern Muunchen 2-1 di leg II
                </p>
            </div>
        </div>

        <div className="flex flex-col border-2 border rounded-lg mb-1">
            <div className="flex justify-start ">
                <img src={indonesia} alt="" className="w-full h-[215px] rounded-tl-lg rounded-tr-lg" />
            </div>
            <div className="ml-1 py-1">
                <h1 className="text-lg font-bold mt-1">
                    <a href="https://bola.okezone.com/read/2024/05/17/51/3009525/timnas-indonesia-resmi-lolos-ke-babak-ketiga-kualifikasi-piala-dunia-2026-zona-asia-meski-kalah-dari-irak-begini-syaratnya">
                        Jadwal Lengkap Timnas Indonesia pada Kualifikasi Piala Dunia 2026
                    </a>
                </h1>
                <p className="mt-1">
                    Sesuai jadwal, Timnas Indonesia akan menjamu Irak (6 Juni 2024) dan Filipina (11 Juni 2024) di dua laga pamungkas Grup F Kualifikasi Piala Dunia 2026 Zona Asia.
                </p>
            </div>
        </div>
    </div>

    <div className="flex flex-col gap-7 items-start w-full ml-6">
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
            Sepak Bola
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
            Pemilihan Presiden
        </a>
        <a href="" className="text-l">
            <span className="text-blue-600"># </span>
            Prosedur Medis
        </a>
        <a href="" className="text-l">
            <span className="text-blue-600"># </span>
            Kemanusiaan
        </a>
        <a href="" className="text-l">
            <span className="text-blue-600"># </span>
            Teknologi
        </a>
    </div>

                        </div>
                    </div>
                </div>
            </article>
        </>
    );
};
