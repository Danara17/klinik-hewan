import React, { useState } from "react";
import asking from "/public/static/asking.jpg";
import { FaChevronDown, FaChevronRight } from "react-icons/fa";

export default function FaqContent() {
    const [openIndex, setOpenIndex] = useState(null);

    const handleClick = (index) => {
        setOpenIndex(openIndex === index ? null : index);
    };

    const faqs = [
        {
            question: "Jenis layanan perawatan hewan apa saja yang Anda tawarkan?",
            answer: "Kami menawarkan berbagai layanan termasuk pemeriksaan kesehatan rutin, vaksinasi, sterilisasi, perawatan gigi, dan layanan darurat."
        },

        {
            question: "Apakah ada vaksinasi wajib untuk hewan peliharaan saya?",
            answer: "Ya, vaksinasi rabies adalah wajib untuk anjing dan kucing di banyak wilayah. Vaksin lainnya mungkin disarankan berdasarkan usia, kesehatan, dan gaya hidup hewan peliharaan Anda."
        },

        {
            question: "Apakah ada layanan darurat di klinik Anda?",
            answer: "Ya, kami menawarkan layanan darurat 24 jam untuk memastikan hewan peliharaan Anda mendapatkan perawatan yang mereka butuhkan kapan saja."
        },

        {
            question: "Apakah ada layanan konsultasi online di klinik Anda?",
            answer: "Ya, kami menawarkan konsultasi online untuk membantu pemilik hewan peliharaan yang tidak dapat mengunjungi klinik secara fisik."
        },

        {
            question: "Seberapa sering saya harus memandikan hewan peliharaan saya?",
            answer: "Seberapa sering Anda memandikan hewan peliharaan Anda tergantung pada jenis bulu, aktivitas, dan kesehatan kulit mereka. Sebagai aturan umum, sebagian besar anjing dan kucing harus dimandikan setiap 4-6 minggu."
        },

        {
            question: "Apa yang diperlukan untuk melisensikan hewan peliharaan saya?",
            answer: "Persyaratan lisensi hewan peliharaan bervariasi berdasarkan wilayah. Biasanya, Anda akan perlu memberikan bukti vaksinasi rabies dan membayar biaya tahunan."
        },
    ];

    return (
        <div className="py-28">
            <div className="mx-auto w-full max-w-screen-xl px-10 py-8">
                <div className="flex flex-col md:flex-row gap-20 -[42px]">
                    <div className="border rounded-lg shadow-lg flex flex-col gap-1 p-7">
                        <h1 className="text-3xl font-bold text-center mt-[-18px] mb-4">
                            FAQ ?
                        </h1>
                        {faqs.map((faq, index) => (
                            <div key={index} className={`border rounded-lg shadow-lg w-full md:w-[28rem] ${index === faqs.length - 1 ? 'mb-0' : 'mb-5'}`}>
                                <button className="text-lg font-semibold py-2 px-4 bg-gray-200 rounded-lg w-full text-left flex justify-between items-center" onClick={() => handleClick(index)}>
                                    <span>{faq.question}</span>
                                    {openIndex === index ? <FaChevronDown /> : <FaChevronRight />}
                                </button>
                                {openIndex === index && <div className="p-4"><p>{faq.answer}</p></div>}
                            </div>
                        ))}
                    </div>
                    <div>
                        <img
                            src={asking}
                            alt="png"
                            className="w-full md:h-[32rem] "
                        />
                    </div>
                </div>
            </div>
        </div>
    );
}
