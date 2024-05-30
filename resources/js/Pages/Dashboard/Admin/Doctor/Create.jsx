import React, { useState } from 'react';
import {router} from "@inertiajs/react";

export default function Create({ dataUser, dataSpecialization }) {
  const [formData, setFormData] = useState({
    id_user: '',
    specialization: ''
  });
  const [errors, setErrors] = useState({});

  const handleChange = (e) => {
    setFormData({
      ...formData,
      [e.target.name]: e.target.value
    });
  };

  const handleSubmit = (e) => {
    e.preventDefault();
    router.post('', formData )
  };

  return (
    <div>
      <div className="flex justify-between">
        <nav className="flex" aria-label="Breadcrumb">
          <ol className="inline-flex items-center space-x-1 md:space-x-2 rtl:space-x-reverse">
            <li className="inline-flex items-center">
              <a href="/dashboard"
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
                <a href="/doctor"
                   className="ms-1 text-sm font-medium text-gray-700 hover:text-blue-600 md:ms-2 dark:text-gray-400 dark:hover:text-white">
                  Doctor
                </a>
              </div>
            </li>
            <li>
              <div className="flex items-center">
                <svg className="rtl:rotate-180 w-3 h-3 text-gray-400 mx-1" aria-hidden="true"
                     xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                  <path stroke="currentColor" strokeLinecap="round" strokeLinejoin="round"
                        strokeWidth="2"
                        d="m1 9 4-4-4-4"/>
                </svg>
                <a href="/doctor/create"
                   className="ms-1 text-sm font-medium text-gray-700 hover:text-blue-600 md:ms-2 dark:text-gray-400 dark:hover:text-white">Create</a>
              </div>
            </li>
          </ol>
        </nav>
      </div>

      <hr className="h-px my-4 bg-gray-200 border-0 dark:bg-gray-500"/>

      <form onSubmit={handleSubmit}>

        <div className="mb-3">
          <label htmlFor="id_user" className="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Pilih User</label>
          <select id="id_user" name="id_user" value={formData.id_user} onChange={handleChange}
                  className="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
            <option value="">Pilih User</option>
            {dataUser.map(user => (
              <option key={user.id} value={user.id}>{user.name}</option>
            ))}
          </select>
          {/*{errors.id_user && <p className="text-xs text-red-500">{errors.id_user}</p>}*/}
        </div>

        <div className="mb-3">
          <label htmlFor="specialization" className="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Pilih Spesialisasi</label>
          <select id="specialization" name="specialization" value={formData.specialization} onChange={handleChange}
                  className="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
            <option value="">Pilih Spesialisasi Dokter</option>
            {dataSpecialization.map(spec => (
              <option key={spec.id} value={spec.id}>{spec.name}</option>
            ))}
          </select>
          {/*{errors.specialization && <p className="text-xs text-red-500">{errors.specialization}</p>}*/}
        </div>

        <div className="flex justify-end my-10">
          <button type="submit"
                  className="px-5 py-2.5 text-sm font-medium text-white inline-flex items-center bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 rounded-lg text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
            Create
          </button>
        </div>
      </form>
    </div>
  );
}
