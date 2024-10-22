<?php



namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class Quran extends Controller
{
    // Function to get Surah index
    public function getSurahIndex()
    {
        $dataQuran = Http::get("https://api.alquran.cloud/v1/meta");

        return view("index", ["collection" => $dataQuran["data"]["surahs"]["references"]]);
    }

    // Function to read a specific Surah
    public function getSurahRead($num)
    {
        $dataQuran = Http::get("https://api.alquran.cloud/v1/surah/$num");

        $edition = "ar.alafasy"; // Use your desired edition
        $bitrate = 128; // Set the audio quality

        // Full surah audio URL
        $surahAudioUrl = "https://cdn.islamic.network/quran/audio-surah/$bitrate/$edition/$num.mp3";

        return view("read", [
            "alldata" => $dataQuran["data"]["ayahs"],
            "surahAudio" => $surahAudioUrl
        ]);
    }

    // Function to get Juz index
    public function getJuzIndex()
    {
        // Fetch Juz data from the API
        $dataQuran = Http::get("https://api.alquran.cloud/v1/juz");

        // Log the response to check its structure
        \Log::info($dataQuran->json());

        if (isset($dataQuran["data"]) && is_array($dataQuran["data"])) {
            return view("juz", ["juzCollection" => $dataQuran["data"]]);
        } else {
            return response()->json(['error' => 'Failed to fetch Juz data'], 500);
        }
    }

    // Function to read a specific Juz
    public function getJuzRead($num)
    {
        // Fetch Juz details from the API
        $dataQuran = Http::get("https://api.alquran.cloud/v1/juz/$num");

        return view("read_juz", [
            "juzData" => $dataQuran["data"],
            "juzAudio" => "https://cdn.islamic.network/quran/audio-juz/$num.mp3" // Change this if you have a specific audio source
        ]);
    }
}
