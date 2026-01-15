<?php

namespace App\Enums;

use Filament\Support\Contracts\HasLabel;

enum IraqiGovernorate: string implements HasLabel
{
    case BAGHDAD = 'baghdad';
    case BASRA = 'basra';
    case NINEVEH = 'nineveh';
    case ERBIL = 'erbil';
    case NAJAF = 'najaf';
    case KARBALA = 'karbala';
    case BABYLON = 'babylon';
    case WASIT = 'wasit';
    case QADISIYYA = 'qadisiyya';
    case MUTHANNA = 'muthanna';
    case MESAN = 'mesan';
    case DHI_QAR = 'dhi_qar';
    case SALAH_AL_DIN = 'salah_al_din';
    case KIRKUK = 'kirkuk';
    case DIYALA = 'diyala';
    case ANBAR = 'anbar';
    case SULAYMANIYAH = 'sulaymaniyah';
    case DUHOK = 'duhok';

    public function getLabel(): string
    {
        return match ($this) {
            self::BAGHDAD => 'Baghdad (بغداد)',
            self::BASRA => 'Basra (البصرة)',
            self::NINEVEH => 'Nineveh (نينوى)',
            self::ERBIL => 'Erbil (إربيل)',
            self::NAJAF => 'Najaf (نجف)',
            self::KARBALA => 'Karbala (كربلاء)',
            self::BABYLON => 'Babylon (بابل)',
            self::WASIT => 'Wasit (واسط)',
            self::QADISIYYA => 'Al-Qadisiyyah (القادسية)',
            self::MUTHANNA => 'Al-Muthanna (المثنى)',
            self::MESAN => 'Maysan (ميسان)',
            self::DHI_QAR => 'Dhi Qar (ذي قار)',
            self::SALAH_AL_DIN => 'Salah al-Din (صلاح الدين)',
            self::KIRKUK => 'Kirkuk (كركوك)',
            self::DIYALA => 'Diyala (ديالى)',
            self::ANBAR => 'Anbar (الأنبار)',
            self::SULAYMANIYAH => 'Sulaymaniyah (السليمانية)',
            self::DUHOK => 'Duhok (دهوك)',
        };
    }
}
