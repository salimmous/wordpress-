"use client";

import { CityClubHeader } from "@/components/cityclub/header";
import { HeroSlider } from "@/components/cityclub/hero-slider";
import { CityClubStats } from "@/components/cityclub/stats";
import { ActivitiesSection } from "@/components/cityclub/activities-section";
import { CityClubLocationFinder } from "@/components/cityclub/location-finder";
import { CoachSection } from "@/components/cityclub/coach-section";
import { TestimonialCarousel } from "@/components/cityclub/testimonial-carousel";
import { CityClubFooter } from "@/components/cityclub/footer";
import { MedicalAssessment } from "@/components/cityclub/medical-assessment";
import { ClubMap } from "@/components/cityclub/club-map";
import { FaqSection } from "@/components/cityclub/faq-section";
import { SpecialOffer } from "@/components/cityclub/special-offer";
import { MembershipPlans } from "@/components/cityclub/membership-plans";
import { MobileApp } from "@/components/cityclub/mobile-app";
import { Gallery } from "@/components/cityclub/gallery";
import { Newsletter } from "@/components/cityclub/newsletter";
import { Partners } from "@/components/cityclub/partners";

export default function DemoPage() {
  return (
    <div className="bg-white min-h-screen">
      <CityClubHeader />
      <HeroSlider />
      <CityClubStats />
      <ActivitiesSection />
      <ClubMap />
      <MembershipPlans />
      <CoachSection />
      <MedicalAssessment />
      <Gallery />
      <MobileApp />
      <SpecialOffer />
      <TestimonialCarousel />
      <FaqSection />
      <Partners />
      <CityClubLocationFinder />
      <Newsletter />
      <CityClubFooter />
    </div>
  );
}
