namespace App\Services;

use Illuminate\Support\Facades\Http;

class HubRiseService
{
    protected string $baseUrl;
    protected string $token;

    public function __construct()
    {
        $this->baseUrl = config('services.hubrise.url');
        $this->token = config('services.hubrise.token');
    }

    public function getProducts()
    {
        $response = Http::withToken($this->token)
                        ->acceptJson()
                        ->get("{$this->baseUrl}/products");

        return $response->json();
    }

    public function getOrders()
    {
        $response = Http::withToken($this->token)
                        ->acceptJson()
                        ->get("{$this->baseUrl}/orders");

        return $response->json();
    }

    public function createOrder(array $orderData)
    {
        $response = Http::withToken($this->token)
                        ->acceptJson()
                        ->post("{$this->baseUrl}/orders", $orderData);

        return $response->json();
    }
}
