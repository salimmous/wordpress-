"use client";

import { useState } from "react";
import Link from "next/link";

export function CityClubHeader() {
  const [mobileMenuOpen, setMobileMenuOpen] = useState(false);

  return (
    <header className="bg-gradient-to-r from-black/90 to-black/80 backdrop-blur-md sticky top-0 z-50 border-b border-white/10">
      <div className="container mx-auto px-6 py-4 flex justify-between items-center">
        <div className="flex items-center">
          <Link href="/demo" className="flex items-center">
            <h1 className="text-3xl font-extrabold">
              <span className="text-[#f26f21]">City</span>
              <span className="text-white">Club</span>
              <sup className="text-[#f26f21] text-sm ml-1 font-black">+</sup>
            </h1>
          </Link>
        </div>

        <nav
          className={`lg:flex space-x-8 ${mobileMenuOpen ? "absolute top-full left-0 right-0 flex flex-col space-y-4 space-x-0 bg-black/95 p-6 backdrop-blur-md border-b border-white/10" : "hidden"}`}
        >
          <Link
            href="#clubs"
            className="text-white/90 font-medium hover:text-[#f26f21] transition-colors relative group"
          >
            Les clubs
            <span className="absolute -bottom-1 left-0 w-0 h-0.5 bg-[#f26f21] transition-all duration-300 group-hover:w-full"></span>
          </Link>
          <Link
            href="#activities"
            className="text-white/90 font-medium hover:text-[#f26f21] transition-colors relative group"
          >
            Activités
            <span className="absolute -bottom-1 left-0 w-0 h-0.5 bg-[#f26f21] transition-all duration-300 group-hover:w-full"></span>
          </Link>
          <Link
            href="#coaching"
            className="text-white/90 font-medium hover:text-[#f26f21] transition-colors relative group"
          >
            Coaching
            <span className="absolute -bottom-1 left-0 w-0 h-0.5 bg-[#f26f21] transition-all duration-300 group-hover:w-full"></span>
          </Link>
          <Link
            href="#bilan"
            className="text-white/90 font-medium hover:text-[#f26f21] transition-colors relative group"
          >
            Bilan Médico-Sportif
            <span className="absolute -bottom-1 left-0 w-0 h-0.5 bg-[#f26f21] transition-all duration-300 group-hover:w-full"></span>
          </Link>
          <Link
            href="#testimonials"
            className="text-white/90 font-medium hover:text-[#f26f21] transition-colors relative group"
          >
            Témoignages
            <span className="absolute -bottom-1 left-0 w-0 h-0.5 bg-[#f26f21] transition-all duration-300 group-hover:w-full"></span>
          </Link>
          <Link
            href="#login"
            className="text-white/90 font-medium hover:text-[#f26f21] transition-colors lg:hidden relative group"
          >
            Connexion
            <span className="absolute -bottom-1 left-0 w-0 h-0.5 bg-[#f26f21] transition-all duration-300 group-hover:w-full"></span>
          </Link>
          <Link
            href="#signup"
            className="text-white/90 font-medium hover:text-[#f26f21] transition-colors lg:hidden relative group"
          >
            S'inscrire
            <span className="absolute -bottom-1 left-0 w-0 h-0.5 bg-[#f26f21] transition-all duration-300 group-hover:w-full"></span>
          </Link>
        </nav>

        <div className="flex items-center gap-4">
          <button className="hidden md:block bg-transparent border-2 border-white/30 text-white px-4 py-2 rounded-full font-medium hover:border-white transition-all hover:bg-white/5">
            Connexion
          </button>
          <button className="bg-[#f26f21] text-white px-6 py-2.5 rounded-full font-semibold hover:bg-[#e05a10] transition-all shadow-lg shadow-[#f26f21]/20">
            S'inscrire
          </button>
          <button
            onClick={() => setMobileMenuOpen(!mobileMenuOpen)}
            className="lg:hidden text-white"
          >
            <svg
              xmlns="http://www.w3.org/2000/svg"
              className="h-6 w-6"
              fill="none"
              viewBox="0 0 24 24"
              stroke="currentColor"
            >
              <path
                strokeLinecap="round"
                strokeLinejoin="round"
                strokeWidth={2}
                d="M4 6h16M4 12h16M4 18h16"
              />
            </svg>
          </button>
        </div>
      </div>
    </header>
  );
}
