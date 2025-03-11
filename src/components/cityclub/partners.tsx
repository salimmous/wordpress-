export function Partners() {
  const partners = [
    {
      name: "Adidas",
      logo: "https://upload.wikimedia.org/wikipedia/commons/2/20/Adidas_Logo.svg",
    },
    {
      name: "Nike",
      logo: "https://upload.wikimedia.org/wikipedia/commons/a/a6/Logo_NIKE.svg",
    },
    {
      name: "Under Armour",
      logo: "https://upload.wikimedia.org/wikipedia/commons/e/e8/Under_armour_logo.svg",
    },
    {
      name: "Technogym",
      logo: "https://upload.wikimedia.org/wikipedia/commons/e/e0/Technogym_logo.svg",
    },
    {
      name: "Life Fitness",
      logo: "https://upload.wikimedia.org/wikipedia/commons/8/83/Life_Fitness_logo.svg",
    },
    {
      name: "Reebok",
      logo: "https://upload.wikimedia.org/wikipedia/commons/0/02/Reebok_logo.svg",
    },
  ];

  return (
    <section className="py-16 bg-gray-100">
      <div className="container mx-auto px-6">
        <div className="text-center mb-12">
          <span className="text-[#f26f21] font-semibold text-lg">
            NOS PARTENAIRES
          </span>
          <h2 className="text-4xl font-bold text-gray-900 mt-2 mb-4">
            Ils Nous Font Confiance
          </h2>
          <p className="text-gray-600 max-w-2xl mx-auto">
            CityClub collabore avec les meilleures marques pour vous offrir une
            expérience fitness de qualité supérieure
          </p>
        </div>

        <div className="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-6 gap-8">
          {partners.map((partner, index) => (
            <div
              key={index}
              className="bg-white p-6 rounded-lg shadow-md hover:shadow-lg transition-shadow flex items-center justify-center h-32"
            >
              <img
                src={partner.logo}
                alt={partner.name}
                className="max-h-16 max-w-full grayscale hover:grayscale-0 transition-all duration-300"
              />
            </div>
          ))}
        </div>

        <div className="mt-12 text-center">
          <p className="text-gray-600">
            Intéressé par un partenariat avec CityClub?{" "}
            <a href="#" className="text-[#f26f21] font-medium hover:underline">
              Contactez-nous
            </a>
          </p>
        </div>
      </div>
    </section>
  );
}
