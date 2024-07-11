<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recepció i Registre de la Mostra</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100 p-8">
    <div class="max-w-4xl mx-auto bg-white p-6 rounded-lg shadow-lg">
        <h1 class="text-2xl font-bold mb-6">Recepció i Registre de la Mostra</h1>
        <form>
            <!-- Dades del pacient -->
            <div class="mb-6">
                <h2 class="text-xl font-semibold mb-4">Dades del pacient</h2>
                <div class="mb-4">
                    <label class="block text-gray-700">Nom i cognoms</label>
                    <input type="text" class="w-full px-3 py-2 border rounded-md" placeholder="Nom i cognoms">
                </div>
                <div class="mb-4">
                    <label class="block text-gray-700">Gènere</label>
                    <select class="w-full px-3 py-2 border rounded-md">
                        <option>H</option>
                        <option>D</option>
                    </select>
                </div>
                <div class="mb-4">
                    <label class="block text-gray-700">Edat</label>
                    <input type="text" class="w-full px-3 py-2 border rounded-md" placeholder="Edat">
                </div>
                <div class="mb-4">
                    <label class="block text-gray-700">Número identificació antic (si s’escau)</label>
                    <input type="text" class="w-full px-3 py-2 border rounded-md" placeholder="Número identificació antic">
                </div>
            </div>

            <!-- Informació clínica -->
            <div class="mb-6">
                <h2 class="text-xl font-semibold mb-4">Informació clínica</h2>
                <textarea class="w-full px-3 py-2 border rounded-md" placeholder="Exemples: Nòdul en mama dreta, Tos i hemoptisi de repetició, Sospita de recidiva de neoplàsia urotelial"></textarea>
            </div>

            <!-- Dades de filiació -->
            <div class="mb-6">
                <h2 class="text-xl font-semibold mb-4">Dades de filiació</h2>
                <div class="mb-4">
                    <label class="block text-gray-700">Procedència</label>
                    <select class="w-full px-3 py-2 border rounded-md">
                        <option>AT10</option>
                        <option>LAB10</option>
                        <option>Extern</option>
                    </select>
                    <input type="text" class="w-full px-3 py-2 border rounded-md mt-2" placeholder="Altres">
                </div>
                <div class="mb-4">
                    <label class="block text-gray-700">Persona que sol·licita l’estudi</label>
                    <input type="text" class="w-full px-3 py-2 border rounded-md" placeholder="Professor, alumne, grup de projecte, grup de laboratori">
                </div>
            </div>

            <!-- Data i Hora de Registre/Recepció -->
            <div class="mb-6">
                <h2 class="text-xl font-semibold mb-4">Data i Hora de Registre/Recepció</h2>
                <input type="datetime-local" class="w-full px-3 py-2 border rounded-md">
            </div>

            <!-- Tipus de mostra -->
            <div class="mb-6">
                <h2 class="text-xl font-semibold mb-4">Tipus de mostra</h2>
                <select class="w-full px-3 py-2 border rounded-md" onchange="handleSampleTypeChange(event)">
                    <option value="">Selecciona un tipus de mostra</option>
                    <option value="exfoliativa">Citologia exfoliativa</option>
                    <option value="paaf">PAAF</option>
                </select>

                <div id="exfoliativa-options" class="mt-4 hidden">
                    <h3 class="text-lg font-semibold mb-2">Citologia exfoliativa</h3>
                    <div class="space-y-2">
                        <label class="block">
                            <input type="checkbox" class="mr-2"> Vaginal simple
                        </label>
                        <label class="block">
                            <input type="checkbox" class="mr-2"> Cervico-vaginal (triple presa)
                        </label>
                        <label class="block">
                            <input type="checkbox" class="mr-2"> Endometri
                        </label>
                        <label class="block">
                            <input type="checkbox" class="mr-2"> Esput
                        </label>
                        <label class="block">
                            <input type="checkbox" class="mr-2"> BAS (broncoaspirat)
                        </label>
                        <label class="block">
                            <input type="checkbox" class="mr-2"> BAL (rentat broncoalveolar)
                        </label>
                        <label class="block">
                            <input type="checkbox" class="mr-2"> Raspallat bronquial
                        </label>
                        <label class="block">
                            <input type="checkbox" class="mr-2"> Orina
                        </label>
                        <label class="block">
                            <input type="checkbox" class="mr-2"> Líquid pleural
                        </label>
                        <label class="block">
                            <input type="checkbox" class="mr-2"> Líquid ascític
                        </label>
                        <label class="block">
                            <input type="checkbox" class="mr-2"> LCR
                        </label>
                        <label class="block">
                            <input type="checkbox" class="mr-2"> Raspat pell mama
                        </label>
                        <label class="block">
                            <input type="checkbox" class="mr-2"> Secreció mama
                        </label>
                        <label class="block">
                            <input type="checkbox" class="mr-2"> Altres
                        </label>
                        <input type="text" class="w-full px-3 py-2 border rounded-md mt-2" placeholder="Especificar altres">
                    </div>
                </div>

                <div id="paaf-options" class="mt-4 hidden">
                    <h3 class="text-lg font-semibold mb-2">PAAF</h3>
                    <div class="space-y-2">
                        <label class="block">
                            <input type="checkbox" class="mr-2"> Gangli limfàtic
                        </label>
                        <label class="block">
                            <input type="checkbox" class="mr-2"> Glàndula salival
                        </label>
                        <label class="block">
                            <input type="checkbox" class="mr-2"> Mama
                        </label>
                        <label class="block">
                            <input type="checkbox" class="mr-2"> Parts toves
                        </label>
                        <label class="block">
                            <input type="checkbox" class="mr-2"> Tiroide
                        </label>
                        <label class="block">
                            <input type="checkbox" class="mr-2"> Altres
                        </label>
                        <input type="text" class="w-full px-3 py-2 border rounded-md mt-2" placeholder="Especificar altres">
                    </div>
                </div>

                <div id="lateralitat-options" class="mt-4 hidden">
                    <h3 class="text-lg font-semibold mb-2">Lateralitat</h3>
                    <div class="space-y-2">
                        <label class="block">
                            <input type="checkbox" class="mr-2"> Dret
                        </label>
                        <label class="block">
                            <input type="checkbox" class="mr-2"> Esquerre
                        </label>
                    </div>
                </div>
            </div>

            <!-- Número d'Identificació Nostre -->
            <div class="mb-6">
                <h2 class="text-xl font-semibold mb-4">Número d'Identificació Nostre</h2>
                <input type="text" class="w-full px-3 py-2 border rounded-md">
            </div>

            <!-- Nom del tècnic de recepció -->
            <div class="mb-6">
                <h2 class="text-xl font-semibold mb-4">Nom del tècnic de recepció</h2>
                <input type="text" class="w-full px-3 py-2 border rounded-md" placeholder="Nom del tècnic">
            </div>

            <!-- Observacions -->
            <div class="mb-6">
                <h2 class="text-xl font-semibold mb-4">Observacions</h2>
                <div class="mb-4">
                    <label class="block text-gray-700">Data i hora</label>
                    <input type="datetime-local" class="w-full px-3 py-2 border rounded-md">
                </div>
                <div class="mb-4">
                    <label class="block text-gray-700">Nom del tècnic</label>
                    <input type="text" class="w-full px-3 py-2 border rounded-md" placeholder="Nom del tècnic">
                </div>
                <div class="mb-4">
                    <label class="block text-gray-700">Comentaris</label>
                    <textarea class="w-full px-3 py-2 border rounded-md" placeholder="Comentaris"></textarea>
                </div>
            </div>

            <div class="text-right">
                <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-md">Enviar</button>
            </div>
        </form>
    </div>

    <script>
        function handleSampleTypeChange(event) {
            const exfoliativaOptions = document.getElementById('exfoliativa-options');
            const paafOptions = document.getElementById('paaf-options');
            const lateralitatOptions = document.getElementById('lateralitat-options');
            
            exfoliativaOptions.classList.add('hidden');
            paafOptions.classList.add('hidden');
            lateralitatOptions.classList.add('hidden');

            if (event.target.value === 'exfoliativa') {
                exfoliativaOptions.classList.remove('hidden');
            } else if (event.target.value === 'paaf') {
                paafOptions.classList.remove('hidden');
                lateralitatOptions.classList.remove('hidden');
            }
        }
    </script>
</body>
</html>
