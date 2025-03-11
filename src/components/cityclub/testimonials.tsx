export function CityClubTestimonials() {
  const testimonials = [
    {
      name: "Mohammed Chaoui",
      role: "Membre depuis 2 ans",
      image: "https://api.dicebear.com/7.x/avataaars/svg?seed=mohammed",
      quote:
        "Depuis que j'ai rejoint CityClub, j'ai perdu 15 kg et gagné en confiance. Les coachs sont incroyables et l'ambiance est motivante.",
    },
    {
      name: "Fatima Zahra",
      role: "Membre depuis 1 an",
      image: "https://api.dicebear.com/7.x/avataaars/svg?seed=fatima",
      quote:
        "J'adore la variété des cours proposés. Le yoga et le pilates ont complètement transformé ma posture et réduit mes douleurs de dos.",
    },
    {
      name: "Rachid Benjelloun",
      role: "Membre depuis 3 ans",
      image: "https://api.dicebear.com/7.x/avataaars/svg?seed=rachid",
      quote:
        "Le fait de pouvoir accéder à tous les clubs CityClub avec un seul abonnement est vraiment pratique pour mon emploi du temps chargé.",
    },
  ];

  return (
    <section className="py-20 bg-gray-900 text-white" id="testimonials">
      <div className="container mx-auto px-6">
        <div className="text-center mb-16">
          <span className="text-[#f26f21] font-semibold text-lg">
            TÉMOIGNAGES
          </span>
          <h2 className="text-4xl font-bold text-white mt-2 mb-4">
            Ce Que Disent Nos Membres
          </h2>
          <p className="text-white/70 max-w-2xl mx-auto">
            Découvrez les histoires de réussite et les expériences de nos
            membres satisfaits
          </p>
        </div>

        <div className="grid grid-cols-1 md:grid-cols-3 gap-8">
          {testimonials.map((testimonial, index) => (
            <div
              key={index}
              className="bg-white/5 backdrop-blur-md rounded-xl p-8 border border-white/10 hover:border-[#f26f21]/30 transition-colors"
            >
              <div className="flex items-center mb-6">
                <img
                  src={testimonial.image}
                  alt={testimonial.name}
                  className="h-16 w-16 rounded-full mr-4 border-2 border-[#f26f21]"
                />
                <div>
                  <h3 className="text-lg font-bold">{testimonial.name}</h3>
                  <p className="text-[#f26f21]">{testimonial.role}</p>
                </div>
              </div>

              <blockquote className="relative">
                <svg
                  xmlns="http://www.w3.org/2000/svg"
                  className="h-8 w-8 text-[#f26f21]/20 absolute -top-4 -left-2"
                  fill="currentColor"
                  viewBox="0 0 24 24"
                >
                  <path d="M14.017 21v-7.391c0-5.704 3.731-9.57 8.983-10.609l.995 2.151c-2.432.917-3.995 3.638-3.995 5.849h4v10h-9.983zm-14.017 0v-7.391c0-5.704 3.748-9.57 9-10.609l.996 2.151c-2.433.917-3.996 3.638-3.996 5.849h3.983v10h-9.983z" />
                </svg>
                <p className="text-white/80 italic pl-6">{testimonial.quote}</p>
              </blockquote>
            </div>
          ))}
        </div>
      </div>
    </section>
  );
}
