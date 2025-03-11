export function Newsletter() {
  return (
    <section className="py-16 bg-[#f26f21]">
      <div className="container mx-auto px-6">
        <div className="bg-white rounded-2xl p-8 md:p-12 shadow-xl relative overflow-hidden">
          <div className="absolute top-0 right-0 w-1/3 h-full opacity-10">
            <svg
              xmlns="http://www.w3.org/2000/svg"
              viewBox="0 0 24 24"
              fill="#f26f21"
              className="w-full h-full"
            >
              <path d="M11.645 20.91l-.007-.003-.022-.012a15.247 15.247 0 01-.383-.218 25.18 25.18 0 01-4.244-3.17C4.688 15.36 2.25 12.174 2.25 8.25 2.25 5.322 4.714 3 7.688 3A5.5 5.5 0 0112 5.052 5.5 5.5 0 0116.313 3c2.973 0 5.437 2.322 5.437 5.25 0 3.925-2.438 7.111-4.739 9.256a25.175 25.175 0 01-4.244 3.17 15.247 15.247 0 01-.383.219l-.022.012-.007.004-.003.001a.752.752 0 01-.704 0l-.003-.001z" />
            </svg>
          </div>

          <div className="grid grid-cols-1 md:grid-cols-2 gap-8 items-center">
            <div>
              <h2 className="text-3xl font-bold text-gray-900 mb-4">
                Restez Informé des Dernières Actualités et Promotions
              </h2>
              <p className="text-gray-600 mb-6">
                Inscrivez-vous à notre newsletter pour recevoir des conseils
                fitness, des offres exclusives et les dernières nouvelles de
                CityClub directement dans votre boîte mail.
              </p>

              <div className="flex flex-col sm:flex-row gap-4">
                <input
                  type="email"
                  placeholder="Votre adresse email"
                  className="flex-1 px-4 py-3 rounded-lg border border-gray-300 focus:ring-[#f26f21] focus:border-[#f26f21] outline-none"
                />
                <button className="bg-[#f26f21] text-white px-6 py-3 rounded-lg font-semibold hover:bg-[#e05a10] transition-colors whitespace-nowrap">
                  S'INSCRIRE
                </button>
              </div>

              <p className="text-gray-500 text-sm mt-4">
                En vous inscrivant, vous acceptez notre{" "}
                <a href="#" className="text-[#f26f21] hover:underline">
                  politique de confidentialité
                </a>
                . Vous pouvez vous désinscrire à tout moment.
              </p>
            </div>

            <div className="hidden md:block">
              <div className="bg-gray-100 p-6 rounded-xl">
                <div className="flex items-start mb-6">
                  <div className="bg-[#f26f21] text-white p-3 rounded-full mr-4">
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
                        d="M11 5.882V19.24a1.76 1.76 0 01-3.417.592l-2.147-6.15M18 13a3 3 0 100-6M5.436 13.683A4.001 4.001 0 017 6h1.832c4.1 0 7.625-1.234 9.168-3v14c-1.543-1.766-5.067-3-9.168-3H7a3.988 3.988 0 01-1.564-.317z"
                      />
                    </svg>
                  </div>
                  <div>
                    <h3 className="font-bold text-gray-900 mb-1">
                      Actualités Exclusives
                    </h3>
                    <p className="text-gray-600 text-sm">
                      Soyez le premier à connaître nos nouveaux clubs et
                      services
                    </p>
                  </div>
                </div>

                <div className="flex items-start mb-6">
                  <div className="bg-[#f26f21] text-white p-3 rounded-full mr-4">
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
                        d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"
                      />
                    </svg>
                  </div>
                  <div>
                    <h3 className="font-bold text-gray-900 mb-1">
                      Offres Limitées
                    </h3>
                    <p className="text-gray-600 text-sm">
                      Accédez à des promotions exclusives réservées aux abonnés
                    </p>
                  </div>
                </div>

                <div className="flex items-start">
                  <div className="bg-[#f26f21] text-white p-3 rounded-full mr-4">
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
                        d="M13 10V3L4 14h7v7l9-11h-7z"
                      />
                    </svg>
                  </div>
                  <div>
                    <h3 className="font-bold text-gray-900 mb-1">
                      Conseils Fitness
                    </h3>
                    <p className="text-gray-600 text-sm">
                      Recevez des conseils d'experts pour optimiser vos
                      entraînements
                    </p>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  );
}
