import React from "react";

export default function Index({dataDoctor}){
    const handleDelete = (id) => {
        // Implement the delete logic here
        // This could be an API call to delete the doctor
        console.log(`Delete doctor with id: ${id}`);
    };
    return (
        <div>
            <div className="flex justify-between">
                <nav className="flex" aria-label="Breadcrumb">
                    <ol className="inline-flex items-center space-x-1 md:space-x-2 rtl:space-x-reverse">
                        <li className="inline-flex items-center">
                            <a href="#"
                               className="inline-flex items-center text-sm font-medium text-gray-700 hover:text-blue-600 dark:text-gray-400 dark:hover:text-white">
                                Dashboard
                            </a>
                        </li>
                        <li>
                            <div className="flex items-center">
                                <svg className="rtl:rotate-180 w-3 h-3 text-gray-400 mx-1" aria-hidden="true"
                                     xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                                    <path stroke="currentColor" strokeLinecap="round" strokeLinejoin="round"
                                          strokeWidth="2"
                                          d="m1 9 4-4-4-4"/>
                                </svg>
                                <a href="#"
                                   className="ms-1 text-sm font-medium text-gray-700 hover:text-blue-600 md:ms-2 dark:text-gray-400 dark:hover:text-white">Doctor</a>
                            </div>
                        </li>
                    </ol>
                </nav>
                <a href="#"
                   className="px-5 py-2.5 text-sm font-medium text-white inline-flex items-center bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 rounded-lg text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                    <svg className="w-3.5 h-3.5 text-white me-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                         width="24"
                         height="24" fill="none" viewBox="0 0 20 20">
                        <path stroke="currentColor" strokeLinecap="round" strokeLinejoin="round" strokeWidth="2"
                              d="M5 12h14m-7 7V5"/>
                    </svg>
                    Add Doctor
                </a>
            </div>

            <hr className="h-px my-4 bg-gray-200 border-0 dark:bg-gray-500"/>

            <div className="overflow-x-auto dark:text-white">
                <table id="myTable" className="table-auto min-w-full dark:bg-gray-800">
                    <thead>
                    <tr>
                        <th className="px-4 py-2">Name</th>
                        <th className="px-4 py-2">Email</th>
                        <th className="px-4 py-2">Phone</th>
                        <th className="px-4 py-2">Address</th>
                        <th className="px-4 py-2">Specialist</th>
                        <th className="px-4 py-2">Ops</th>
                    </tr>
                    </thead>
                    <tbody>
                    {dataDoctor.map((doctor) => (
                        <tr key={doctor.id}>
                            <td>{doctor.name}</td>
                            <td>{doctor.user.email}</td>
                            <td>{doctor.phone}</td>
                            <td>{doctor.address}</td>
                            <td>{doctor.specialist.name}</td>
                            <td className="gap-2">
                                <a href={`/doctor/edit/${doctor.id}`}
                                   className="px-3 py-2 text-xs font-medium text-center inline-flex items-center text-white bg-green-700 rounded-lg hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-green-300 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-900">
                                    <svg className="w-3 h-3 text-white" aria-hidden="true"
                                         xmlns="http://www.w3.org/2000/svg"
                                         width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                                        <path fillRule="evenodd"
                                              d="M11.32 6.176H5c-1.105 0-2 .949-2 2.118v10.588C3 20.052 3.895 21 5 21h11c1.105 0 2-.948 2-2.118v-7.75l-3.914 4.144A2.46 2.46 0 0 1 12.81 16l-2.681.568c-1.75.37-3.292-1.263-2.942-3.115l.536-2.839c.097-.512.335-.983.684-1.352l2.914-3.086Z"
                                              clipRule="evenodd"/>
                                        <path fillRule="evenodd"
                                              d="M19.846 4.318a2.148 2.148 0 0 0-.437-.692 2.014 2.014 0 0 0-.654-.463 1.92 1.92 0 0 0-1.544 0 2.014 2.014 0 0 0-.654.463l-.546.578 2.852 3.02.546-.579a2.14 2.14 0 0 0 .437-.692 2.244 2.244 0 0 0 0-1.635ZM17.45 8.721 14.597 5.7 9.82 10.76a.54.54 0 0 0-.137.27l-.536 2.84c-.07.37.239.696.588.622l2.682-.567a.492.492 0 0 0 .255-.145l4.778-5.06Z"
                                              clipRule="evenodd"/>
                                    </svg>
                                </a>
                                <button type="button" onClick={() => handleDelete(doctor.id)}
                                        className="px-3 py-2 text-xs font-medium text-center inline-flex items-center text-white bg-red-700 rounded-lg hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900">
                                    <svg className="w-3 h-3 text-white" aria-hidden="true"
                                         xmlns="http://www.w3.org/2000/svg"
                                         width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                                        <path fillRule="evenodd"
                                              d="M8.586 2.586A2 2 0 0 1 10 2h4a2 2 0 0 1 2 2v2h3a1 1 0 1 1 0 2v12a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V8a1 1 0 0 1 0-2h3V4a2 2 0 0 1 .586-1.414ZM10 6h4V4h-4v2Zm1 4a1 1 0 1 0-2 0v8a1 1 0 1 0 2 0v-8Zm4 0a1 1 0 1 0-2 0v8a1 1 0 1 0 2 0v-8Z"
                                              clipRule="evenodd"/>
                                    </svg>
                                </button>
                            </td>
                        </tr>
                    ))}
                    </tbody>
                </table>
            </div>
        </div>
    );
}
