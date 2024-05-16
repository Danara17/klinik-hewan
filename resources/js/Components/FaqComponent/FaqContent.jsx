import asking from "/public/static/asking.jpg";

export default function FaqContent() {
    return (
        <>
            <div className="py-28">
                <div className="mx-auto w-full max-w-screen-xl p-4 py-8">
                    <div className="flex gap-12 -[42px]">
                        <div className="flex flex-col gap-5">
                            <h1 className="text-4xl font-bold">
                                Pertanyaan Umum
                            </h1>
                            <button className="text-xl font-semibold py-2 px-4 bg-gray-200 rounded-lg w-[32rem] text-left">
                                Pertanyaan?
                            </button>
                            <button className="text-xl font-semibold py-2 px-4 bg-gray-200 rounded-lg w-[32rem] text-left">
                                Pertanyaan?
                            </button>
                        </div>
                        <div>
                            <img
                                src={asking}
                                alt="png"
                                className="md:h-[32rem] "
                            />
                        </div>
                    </div>
                </div>
            </div>
        </>
    );
}
