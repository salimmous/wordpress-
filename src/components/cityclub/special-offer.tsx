export function SpecialOffer() {
  return (
    <section className="py-16 bg-black relative overflow-hidden">
      <div className="absolute inset-0 opacity-30">
        <img
          src="https://images.unsplash.com/photo-1571388208497-71bedc66e932?w=1200&q=80"
          alt="Background"
          className="w-full h-full object-cover"
        />
      </div>

      <div className="container mx-auto px-6 relative z-10">
        <div className="max-w-4xl mx-auto text-center">
          <div className="inline-block bg-[#f26f21] text-white px-6 py-2 rounded-full text-lg font-bold mb-6 animate-pulse">
            OFFRE SPÉCIALE LIMITÉE
          </div>

          <h2 className="text-5xl md:text-6xl font-black text-white mb-6">
            <span className="text-[#f26f21]">3 MOIS</span> OFFERTS
          </h2>

          <p className="text-xl text-white/80 mb-8">
            Pour toute souscription à un abonnement annuel, bénéficiez de 3 mois
            supplémentaires gratuits. Offre valable jusqu'au 31 mars.
          </p>

          <div className="grid grid-cols-1 md:grid-cols-3 gap-6 mb-10">
            <div className="bg-white/10 backdrop-blur-sm p-6 rounded-xl border border-white/20">
              <div className="text-4xl font-black text-[#f26f21] mb-2">50%</div>
              <p className="text-white">
                de réduction sur les frais d'inscription
              </p>
            </div>

            <div className="bg-white/10 backdrop-blur-sm p-6 rounded-xl border border-white/20">
              <div className="text-4xl font-black text-[#f26f21] mb-2">3+3</div>
              <p className="text-white">
                mois offerts pour tout abonnement annuel
              </p>
            </div>

            <div className="bg-white/10 backdrop-blur-sm p-6 rounded-xl border border-white/20">
              <div className="text-4xl font-black text-[#f26f21] mb-2">1</div>
              <p className="text-white">bilan médico-sportif gratuit</p>
            </div>
          </div>

          <button className="bg-[#f26f21] hover:bg-[#e05a10] text-white px-10 py-4 rounded-full text-xl font-bold transition-all shadow-lg shadow-[#f26f21]/20">
            JE PROFITE DE L'OFFRE
          </button>
        </div>
      </div>
    </section>
  );
}
