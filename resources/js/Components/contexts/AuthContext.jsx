import React, { createContext, useState, useEffect } from 'react';
import { Inertia } from '@inertiajs/inertia';

export const AuthContext = createContext();

export const AuthProvider = ({ children }) => {
  const [user, setUser] = useState(null);

  useEffect(() => {
    // Fetch user data from the server or local storage
    const fetchUser = async () => {
      const response = await fetch('/user');
      const userData = await response.json();
      setUser(userData);
    };

    fetchUser();
  }, []);

  const logout = () => {
    // Handle logout logic, e.g., clear user data and redirect
    setUser(null);
    Inertia.post('/logout');
  };

  return (
    <AuthContext.Provider value={{ user, logout }}>
      {children}
    </AuthContext.Provider>
  );
};
